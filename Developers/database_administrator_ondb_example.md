### assigned_role
| AssignedRoleID |AssignedRole          |PreferredTerm         |SpecificCategory               |Category1Tags|PublicKeywords                                                   |SearchKeywords                                                                                                                                           |HumanSearchKeywords                                                                            |IndividualSearchWords                                                        |CommonSearches                            |AssignedRoleStatus|AssignedRoleStatusComment|
-------------- | ---------------------- | ---------------------- | ------------------------------- | ------------- | ----------------------------------------------------------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------- | ------------------------------------------ | ------------------ | -------------------------|
|61|administrator-database|Database Administrator|Information Technology:Database|             |DBA, Database Administrator, Database Manager, Data Administrator|DBA, Database Administrator, Database Manager, Data Administrator, Database Admin, Database DBA, Manager Database, Support DBA, DBAs, Database Supervisor|DBA, Database Administrator, Database Manager, Data Administrator, Database Admin, Database DBA|Database, Administrator, DBA, Manager, Admin, Data, Support, Supervisor, DBAs|DBA, Database Administrator, Database Jobs|                  |                         |

### assigned_role_job_searches
AssignedRoleID|AssignedRole          |AssignedRoleToJobSearchStatus|JobSearchAssignedRoleID|JobSearchAssignedRole|
--------------|----------------------|-----------------------------|-----------------------|---------------------|
|61|administrator-database|y                            |                   4178|jobs-database        |

### assigned_role_parent_child
ChildAssignedRoleID|ChildAssignedRole           |ChildPreferredTerm        |ParentAssignedRoleID|ParentAssignedRole    |ParentPreferredTerm   |
-------------------|----------------------------|--------------------------|--------------------|----------------------|----------------------|
|62|administrator-db2database   |DB2 DBA                   |                  61|administrator-database|Database Administrator|
| 70|administrator-gisdatabase   |GIS Database Administrator|                  61|administrator-database|Database Administrator|
| 82|administrator-mysqldatabase |MySQL DBA                 |                  61|administrator-database|Database Administrator|
| 86|administrator-oracledatabase|Oracle DBA                |                  61|administrator-database|Database Administrator|
| 98|administrator-sqldatabase   |SQL DBA                   |                  61|administrator-database|Database Administrator|

### assigned_role_parent_child_job_searches_calculated
ChildAssignedRoleID|AssignedRoleExpansion                                    |
-------------------|---------------------------------------------------------|
| 61|database_jobs                                            |
| 62|database_administrator,database_jobs                     |
| 70|database_administrator,database_jobs                     |
| 82|database_administrator,database_jobs                     |
| 86|database_administrator,oracle_database_jobs,database_jobs|
| 98|database_administrator,sql_jobs,database_jobs            |

### assigned_role_synonym_text_file_for_index
AssignedRoleID|AssignedRole          |SearchKeywords                                                                                                                                           |PreferredTerm         |AssignedRoleExpansion               |
--------------|----------------------|---------------------------------------------------------------------------------------------------------------------------------------------------------|----------------------|------------------------------------|
|61|administrator-database|dba, database administrator, database manager, data administrator, database admin, database dba, manager database, support dba, dbas, database supervisor|database administrator|database_administrator,database_jobs|

### job_title_dictionary
FindPhraseID|FindPhrase                   |FindPhraseStatus|AssignedRoleID|AssignedRole                |AssignedRoleRank|
------------|-----------------------------|----------------|--------------|----------------------------|----------------|
  |8611|Data Administrator           |assignedrole    |            61|administrator-database      |               4|
|8749|Database Admin               |assignedrole    |            61|administrator-database      |               5|
|    8754|Database Administrator       |assignedrole    |            61|administrator-database      |               2|
|   8759|Database DBA                 |assignedrole    |            61|administrator-database      |               6|
|  8764|Database Manager             |assignedrole    |            61|administrator-database      |               3|
|  8775|Database Supervisor          |assignedrole    |            61|administrator-database      |              10|
|  8819|DBA                          |assignedrole    |            61|administrator-database      |               1|
|8822|DBAs                         |assignedrole    |            61|administrator-database      |               9|
|21409|Manager Database             |assignedrole    |            61|administrator-database      |               7|
|35803|Support DBA                  |assignedrole    |            61|administrator-database      |               8|
|8817|DB2 DBA                      |assignedrole    |            62|administrator-db2database   |               1|
|15875|GIS Database Administrator   |assignedrole    |            70|administrator-gisdatabase   |               1|
|24083|MySQL DBA                    |assignedrole    |            82|administrator-mysqldatabase |               1|
|25457|Oracle Database Administrator|assignedrole    |            86|administrator-oracledatabase|               2|
|25459|Oracle Database Architect    |assignedrole    |            86|administrator-oracledatabase|               3|
|25465|Oracle DBA                   |assignedrole    |            86|administrator-oracledatabase|               1|
|22129|Manager SQL                  |assignedrole    |            98|administrator-sqldatabase   |               5|
|40067|SQL Database Administrator   |assignedrole    |            98|administrator-sqldatabase   |               2|
|34656|SQL DBA                      |assignedrole    |            98|administrator-sqldatabase   |               1|
|34659|SQL Manager                  |assignedrole    |            98|administrator-sqldatabase   |               4|
|34662|SQL Server DBA               |assignedrole    |            98|administrator-sqldatabase   |               3|
|34664|SQL Supervisor               |assignedrole    |            98|administrator-sqldatabase   |               6|