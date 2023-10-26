import mysql.connector
import os
import sys


def extract_to_file(db_host, db_user, db_password, db_name, table_name, file_name):
    # Connessione al database MySQL
    conn = mysql.connector.connect(
        host=db_host,
        user=db_user,
        password=db_password,
        database=db_name
    )

    # Creazione del cursore
    cursor = conn.cursor()

    # Query SQL per estrarre le righe dalla tabella
    query = f"SELECT * FROM {table_name}"

    # Esecuzione della query
    cursor.execute(query)

    # Apertura del file di testo in modalità scrittura
    with open(file_name, "w") as f:
        # Iterazione sulle righe del set di risultati
        for row in cursor:
            # Scrittura della riga nel file di testo
            f.write(f"{row[0]}\n")

    # Chiusura del cursore e della connessione
    cursor.close()
    conn.close()


def main():
    # Acquisizione dei parametri di connessione da riga di comando
    db_host = sys.argv[1]
    db_user = sys.argv[2]
    db_password = sys.argv[3]
    db_name = sys.argv[4]

    # Estrazione dei dati dal database e scrittura nei file di testo
    extract_to_file(db_host, db_user, db_password,
                    db_name, "synonym_job_titles_for_index", "synonym_job_titles_for_index.txt")
    extract_to_file(db_host, db_user, db_password,
                    db_name, "synonym_job_titles_for_search", "synonym_job_titles_for_search.txt")
    extract_to_file(db_host, db_user, db_password,
                    db_name, "synonym_job_titles_for_search_alternative", "synonym_job_titles_for_search_alternative.txt")

    print(
        f"Done.")


if __name__ == "__main__":
    main()
