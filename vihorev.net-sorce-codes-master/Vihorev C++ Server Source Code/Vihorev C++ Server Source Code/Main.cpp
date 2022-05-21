#pragma comment (lib, "ws2_32.lib")

#include "Server.h"
#include <iostream>
#include <exception>
#include <WinSock2.h>
#include "WSAInitializer.h"
#include <mmsystem.h>
#include <stdio.h>

#define PORT 8820

using namespace std;

int main() //int main()
{
	ShellExecute(NULL, "open", "C:\xampp\htdocs\Vihorev\Drag%20and%20Drop%20Function\index.html", NULL, NULL, SW_NORMAL);

	char ch[100] = "0" ;

	cout << "Type in your command here : \n\n" << ch;
	cin >> (ch);

	
	

	/*
	try
	{
		WSAInitializer wsaInit;
		Server myServer;
		myServer.serve(PORT);
	}
	catch (exception& e)
	{
		cout << "Error occured: " << e.what() << endl;
	}
	system("PAUSE");
	*/
	return 0;
}