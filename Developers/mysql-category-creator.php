<?php

/**
 * Creates 3 tables, (cat1,cat2,cat3), from the distinct values in `assigned_role`.`specificCategory` splitted by ':'
 * Each table rapresents a category level, cat3 is a subcategory of cat2 which is
 * a subcategory of cat1.
 * Not every category has a subcategory.
 * A specificCategory is the result of the union of a cat1 entry with his linked 
 * subcategories: "cat1:cat2:cat3".
 * cat1->cat2->cat3 has a 1->n->m relationship.
 */

$dbh = new PDO('mysql:host=localhost;dbname=thesaurus_of_job_titles', "root", "root");

// Create new category tables
try {
    $dbh->query('
    DROP TABLE IF EXISTS `thesaurus_of_job_titles`.`cat3`;
    DROP TABLE IF EXISTS `thesaurus_of_job_titles`.`cat2`;
    DROP TABLE IF EXISTS `thesaurus_of_job_titles`.`cat1`;
    
    CREATE TABLE `thesaurus_of_job_titles`.`cat1` (
      `id` INT NOT NULL AUTO_INCREMENT,
      `name` VARCHAR(255) NOT NULL,
      PRIMARY KEY (`id`),
      UNIQUE KEY `unique_name` (`name`)
    );
    
    CREATE TABLE `thesaurus_of_job_titles`.`cat2` (
      `id` INT NOT NULL AUTO_INCREMENT,
      `name` VARCHAR(255) NOT NULL,
      `id_cat1` INT NOT NULL,
      PRIMARY KEY (`id`),
      FOREIGN KEY (`id_cat1`) REFERENCES `thesaurus_of_job_titles`.`cat1` (`id`),
      UNIQUE KEY `unique_name` (`name`)
    );
    
    CREATE TABLE `thesaurus_of_job_titles`.`cat3` (
      `id` INT NOT NULL AUTO_INCREMENT,
      `name` VARCHAR(255) NOT NULL,
      `id_cat2` INT NOT NULL,
      PRIMARY KEY (`id`),
      FOREIGN KEY (`id_cat2`) REFERENCES `thesaurus_of_job_titles`.`cat2` (`id`),
      UNIQUE KEY `unique_name` (`name`)
    );');
} catch (\Throwable $th) {
    throw $th;
}

// Populate category tables accordignly
$cat1ExistsQuery = "select id from cat1 where name='?'";
$cat2ExistsQuery = "select id from cat2 where name='?'";
$cat3ExistsQuery = "select id from cat3 where name='?'";
$stmt = $dbh->query('select distinct(ar.specificCategory) from assigned_role ar');
$allcats = $stmt->fetchAll(PDO::FETCH_NUM);
foreach ($allcats as $key => $value) {
    $catString = $value[0];
    $catSeparated = explode(':', $catString);
    $cat1 = $catSeparated[0];
    $cat2 = !empty($catSeparated[1]) ? $catSeparated[1] : '';
    $cat3 = !empty($catSeparated[2]) ? $catSeparated[2] : '';
    $cat1Id = $dbh->query(str_replace('?', $cat1, $cat1ExistsQuery))->fetch();
    if ($cat1Id === false) {
        $stmt = $dbh->prepare("insert into cat1 (name) values ('$cat1');");
        try {
            $stmt->execute();
            $cat1Id = $dbh->lastInsertId();
        } catch (\Throwable $th) {
            throw $th;
        }
    } else {
        $cat1Id = $cat1Id[0];
    }
    if ($cat2 != '') {
        $cat2Id = $dbh->query(str_replace('?', $cat2, $cat2ExistsQuery))->fetch();
        if ($cat2Id === false) {
            $stmt = $dbh->prepare("insert into cat2 (name,id_cat1) values ('$cat2','$cat1Id');");
            try {
                $stmt->execute();
                $cat2Id = $dbh->lastInsertId();
            } catch (\Throwable $th) {
                throw $th;
            }
        } else {
            $cat2Id = $cat2Id[0];
        }
        if ($cat3 != '') {
            $cat3Id = $dbh->query(str_replace('?', $cat3, $cat3ExistsQuery))->fetch();
            if ($cat3Id === false) {
                $stmt = $dbh->prepare("insert into cat3 (name,id_cat2) values ('$cat3','$cat2Id');");
                try {
                    $stmt->execute();
                    $cat3Id = $dbh->lastInsertId();
                } catch (\Throwable $th) {
                    throw $th;
                }
            }
        }
    }
}

var_dump("Done.");
