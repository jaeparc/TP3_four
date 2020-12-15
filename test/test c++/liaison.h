//---------------------------------------------------------------------------

#ifndef liaisonH
#define liaisonH
//---------------------------------------------------------------------------
#include <System.Classes.hpp>
#include <Vcl.Controls.hpp>
#include <Vcl.StdCtrls.hpp>
#include <Vcl.Forms.hpp>
#include <IdBaseComponent.hpp>
#include <IdComponent.hpp>
#include <IdCustomTCPServer.hpp>
#include <IdTCPServer.hpp>
#include <IdContext.hpp>
//---------------------------------------------------------------------------
class TForm1 : public TForm
{
__published:	// Composants gérés par l'EDI
	TIdTCPServer *IdTCPServer1;
	TButton *activer;
	TButton *desactiver;
	TMemo *Memo1;
	TLabel *Label1;
	void __fastcall activerClick(TObject *Sender);
	void __fastcall desactiverClick(TObject *Sender);
	void __fastcall IdTCPServer1Connect(TIdContext *AContext);
	void __fastcall IdTCPServer1Execute(TIdContext *AContext);
private:	// Déclarations utilisateur
public:		// Déclarations utilisateur
	__fastcall TForm1(TComponent* Owner);
};
//---------------------------------------------------------------------------
extern PACKAGE TForm1 *Form1;
//---------------------------------------------------------------------------
#endif
