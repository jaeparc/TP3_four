#pragma hdrstop
#pragma argsused

#ifdef _WIN32
#include <tchar.h>
#else
  typedef char _TCHAR;
  #define _tmain main
#endif

#include <stdio.h>
#include <iostream>
#include "TCPserver.h"

using namespace std;

int main()
{
	TCPserver *TCPs = new TCPserver();
	bool TCPser = TCPs->TCPconnexion(203);
	char buf[60] = {0};
	char test[60] = {0};
	char *sendbuf = "45";
	int x;

	//Connection du client

    TCPser = TCPs->TCPWaitConnexion();

			if (TCPser == true)
			{
				cout << "connexion du client"<<endl;
			}

		do
		{
			for ((x = 0); x < strlen(buf); x++)
			{
			  test[x] = buf[x];
			}

			TCPser = TCPs->TCPWaitConnexion();



			TCPs->TCPsend(sendbuf);      // Envoi de la temperature

			TCPs->TCPrecv(buf, 2);       // Reception du buffer

			if ( buf[0] != '\n')
			{
				if( test[0] != buf [0] || test[1] != buf [1] )
				{
				  cout <<buf<<endl;
				}

			}

			TCPs->TCPclose();      // TCPserver close

		} while (TCPser == true);

}
