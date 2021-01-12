#pragma once
#include <winsock2.h>
#include <stdio.h>
#pragma comment(lib,  "ws2_32.lib")
class TCPserver
{

private:
        SOCKET sock;
	SOCKET csock;
	char *buffer;
public:
	TCPserver();
        bool TCPconnexion(int PORT); // connexion TCP sur le port
        bool TCPWaitConnexion(); // attente de connexion
        bool TCPsend(char *buffer); // envoie du contenue du buffer
        bool TCPrecv(char *buffer, int len); // recevoir et lecture du buffer
        bool TCPclose(); // fermer la connexion TCP
};


