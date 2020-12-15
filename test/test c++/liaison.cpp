//---------------------------------------------------------------------------

#include <vcl.h>
#pragma hdrstop

#include "liaison.h"
//---------------------------------------------------------------------------
#pragma package(smart_init)
#pragma resource "*.dfm"
TForm1 *Form1;
//---------------------------------------------------------------------------
__fastcall TForm1::TForm1(TComponent* Owner)
	: TForm(Owner)
{
}
//---------------------------------------------------------------------------
void __fastcall TForm1::activerClick(TObject *Sender)
{
    	Label1->Caption="Le serveur est en cours d'éxecution";
		Memo1->Visible=true;
		activer->Visible=false;
		desactiver->Visible=true;
}
//---------------------------------------------------------------------------
void __fastcall TForm1::desactiverClick(TObject *Sender)
{
    	IdTCPServer1->Active=false;
		Memo1->Visible=false;
		desactiver->Visible=false;
		activer->Visible=true;
		Label1->Caption="Le serveur est éteint";
}
//---------------------------------------------------------------------------
void __fastcall TForm1::IdTCPServer1Connect(TIdContext *AContext)
{
	Memo1->Lines->Add("L'adresse ip du client :");
	Memo1->Lines->Add(AContext->Binding->PeerIP);
	Memo1->Lines->Add("Le port du client est :");
	Memo1->Lines->Add(IntToStr(AContext->Binding->PeerPort));
		AContext->Connection->IOHandler->WriteLn("$PGA;56465;46;546;456;465;46");
		AContext->Connection->Disconnect();
}
//---------------------------------------------------------------------------
void __fastcall TForm1::IdTCPServer1Execute(TIdContext *AContext)
{
	Label1->Caption="Le serveur a reçu";
	Sleep(3000);
	Label1->Caption="Le serveur est en cours d'exécution";
}
//---------------------------------------------------------------------------
