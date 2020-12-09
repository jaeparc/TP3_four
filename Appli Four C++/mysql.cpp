//---------------------------------------------------------------------------

#pragma hdrstop

#include "Mysql.h"
//---------------------------------------------------------------------------
#pragma package(smart_init)
Mysql::Mysql()
{
	this->mysql= new MYSQL();
}
Mysql::~Mysql()
{
	delete this->mysql;
}
bool Mysql::connect(string host,string user,string password,string dbname)
{

	mysql_init(this->mysql);

	//on definit les options à la connexion
	mysql_options(this->mysql,
				  MYSQL_READ_DEFAULT_GROUP,
				  "option");
	//on se connecte à la bdd si la connexion est réussie
	//on retourne true sinon false
	if(mysql_real_connect(this->mysql,
					   host.c_str(),
					   user.c_str(),
					   password.c_str(),
					   dbname.c_str(),
					   NULL,
					   0,
					   NULL))
	{
		 return true;
	}
	else
	{
		return false;
	}
}
bool Mysql::insert(string requete)
{
	// Exécute une requête SQL
	mysql_query(this->mysql,requete.c_str());
	//si au moins une ligne à etait affecté on retourne true sinon false
	if(mysql_affected_rows(this->mysql)>0)
	{
		return true;
	}
	else
	{
		return false;
	}
}
bool Mysql::update (std::string requete)
{
	// Exécute une requête SQL
	mysql_query(this->mysql,requete.c_str());
	//si au moins une ligne à etait affecté on retourne true sinon false
	if(mysql_affected_rows(this->mysql)>0)
	{
		return true;
	}
	else
	{
		return false;
	}
}
std::vector< std::vector<string> > Mysql::select(string requete)
{
	std::vector< std::vector<string> > resultatRequete;
	std::vector<string> copie;
	MYSQL_RES *res; /* holds the result set */
	MYSQL_ROW row;
	int nbColones=0;

	mysql_query(this->mysql,requete.c_str());
	res = mysql_store_result(this->mysql);
	//resultatRequete.resize(mysql_num_rows(res)); //commenter selon Mr Gremont
	nbColones =  mysql_num_fields(res);


	 while ((row = mysql_fetch_row(res))) {

	   for(int j = 0; j < nbColones; j++)
	   {
		   if(row[j] != NULL)
		   {
				copie.push_back(row[j]);
		   }
	   }

	   resultatRequete.push_back(copie);
	   copie.clear();
	}
	if(res != NULL)
	mysql_free_result(res);

	return resultatRequete;
}
