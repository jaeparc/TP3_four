//---------------------------------------------------------------------------

#ifndef IHMfourH
#define IHMfourH
//---------------------------------------------------------------------------
#include <System.Classes.hpp>
#include <Vcl.Controls.hpp>
#include <Vcl.StdCtrls.hpp>
#include <Vcl.Forms.hpp>
#include "four.h"
#include <Vcl.ExtCtrls.hpp>
#include <VCLTee.Chart.hpp>
#include <VCLTee.Series.hpp>
#include <VCLTee.TeeFunci.hpp>
#include <VclTee.TeeGDIPlus.hpp>
#include <VCLTee.TeEngine.hpp>
#include <VCLTee.TeeProcs.hpp>
#include <string>

using namespace std;
//---------------------------------------------------------------------------
class TForm1 : public TForm
{
__published:	// Composants g�r�s par l'EDI
	TLabel *LblTemp;
	TLabel *LblCommande;
	TTimer *Timer1;
	TTimer *Timer2;
	TButton *BtnStart;
	TButton *BtnArret;
	TLabel *Label1;
	TEdit *EditTemp;
	TChart *GraphTemp;
	TFastLineSeries *Series1;
	TAddTeeFunction *TeeFunction1;
	void __fastcall Timer1Timer(TObject *Sender);
	void __fastcall Timer2Timer(TObject *Sender);
	void __fastcall BtnArretClick(TObject *Sender);
	void __fastcall BtnStartClick(TObject *Sender);

private:

	four *FOUR;
	float temperature; // consigne
	float Tcom; // temp�rature relev�e du four
	int volt; // puissance du four


public:		// D�clarations utilisateur

	__fastcall TForm1(TComponent* Owner);
};
//---------------------------------------------------------------------------
extern PACKAGE TForm1 *Form1;
//---------------------------------------------------------------------------
#endif
