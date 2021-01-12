//---------------------------------------------------------------------------

#ifndef MysqlH
#define MysqlH
#include <iostream>
#include <cstring>
#include <string>
#include "include\mysql.h"
#include <vcl.h>
#include <vector>

using namespace std;

class Mysql
{
	private :
		MYSQL *mysql;
	public:
		Mysql();
		~Mysql();
		bool connect(string host,string user,string password,string dbname);
		bool insert(string requete);
		bool update (std::string requete);
		vector< std::vector<string> > select(string requete);

};
//---------------------------------------------------------------------------
#endif
