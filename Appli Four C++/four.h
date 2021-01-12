//---------------------------------------------------------------------------

#ifndef fourH
#define fourH
//---------------------------------------------------------------------------
 #include <vcl.h>
 #include "./include/dask.h"


class four{

	   I16 IdCarte;

	public:

	four();
	~four(); // libération du four
	double tension;  // tension V
	int	Lecture(); // lire tension + conversion
	void Ecriture(float tension);  // Ecriture une tension
};



#endif

