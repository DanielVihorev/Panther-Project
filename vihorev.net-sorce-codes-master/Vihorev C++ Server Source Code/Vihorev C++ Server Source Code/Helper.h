#pragma once

#include <vector>
#include <string>
#include <WinSock2.h>

using namespace std;


enum MessageType : byte
{

};


class Helper
{
public:

	static int getMessageTypeCode(SOCKET sc);
	static int getIntPartFromSocket(SOCKET sc, int bytesNum);
	static string getStringPartFromSocket(SOCKET sc, int bytesNum);
	static void sendData(SOCKET sc, std::string message);

private:
	static char* getPartFromSocket(SOCKET sc, int bytesNum);
	static char* getPartFromSocket(SOCKET sc, int bytesNum, int flags);

};


#ifdef _DEBUG // vs add this define in debug mode
#include <stdio.h>
// Q: why do we need traces ?
// A: traces are a nice and easy way to detect bugs without even debugging
// or to understand what happened in case we miss the bug in the first time
#define TRACE(msg, ...) printf(msg "\n", __VA_ARGS__);
// for convenient reasons we did the traces in stdout
// at general we would do this in the error stream like that
// #define TRACE(msg, ...) fprintf(stderr, msg "\n", __VA_ARGS__);

#else // we want nothing to be printed in release version
#define TRACE(msg, ...) printf(msg "\n", __VA_ARGS__);
#define TRACE(msg, ...) // do nothing
#endif