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
	bool TCPconnexion(int PORT);
	bool TCPWaitConnexion();
	bool TCPsend(char *buffer);
	bool TCPrecv(char *buffer, int len);
	bool TCPclose();
};


