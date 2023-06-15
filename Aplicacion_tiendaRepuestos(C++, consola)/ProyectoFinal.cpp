#include <iostream>
#include <stdio.h>
#include <stdlib.h>
#include <conio.h>
#include <windows.h>
#include <time.h>

using namespace std;

void pausa();
void factura();
void despedida();
void ultimaOpcion();


int main()
{
    SetConsoleTitleA ("REPUESTOS MONRROY") ;
    cin.get();
    system("color 8B");
    
    int opcion, opcionSub;
//Productos marca Honda
    string M0001[3]={"Motor de arranque","Celica","$300"};
    string M0002[3]={"Culata completa TD27","Hardby","$300"};
    string M0003[3]={"Tapadera de distribucion","4runer","$150"};

    string S0001[3]={"Corona trasera","Pick up","$200"};
    string S0002[3]={"Cremallera hidraulica","200Sx","$90"};
    string S0003[3]={"Servo freno 22R","Pick up","$200"};

    string SD0001[3]={"Masa mecanica","Pick up","$100"};
    string SD0002[3]={"Compresor de aire","Marca234","110.75"};
    string SD0003[3]={"Alternador"," Matrix","$150"};

    string SE0001[3]={"Flujo de aire","Tiburon","$50"};
    string SE0002[3]={"Compresor de aire","Marca234","110.75"};
    string SE0003[3]={"Compresor de aire","Tilda","$200"};

    string SEL0001[3]={"Motor de arranque","Acura","$200"};
    string SEL0002[3]={"Alternador","Poliac Wave","$250"};
    string SEL0003[3]={"Power Stering","Celica","$150"};

//  Productos marca Hyundai
    string HYM0001[3]={"Culata completa 4D56","Hyundai H100","$300"};
    string HYM0002[3]={"Culata completa 4D56","Hyundai Terracan","$350"};
    string HYM0003[3]={"Carburador 22R","Hyundai","$200"};

    string HYS0001[3]={"Servo freno","D21 Hardby","$200"};
    string HYS0002[3]={"Corona trasera","Pick up","$200"};
    string HYS0003[3]={"Cremallera hidraulica","200Sx","$90"};

    string HYSD0001[3]={"Compresor de aire","Marca234","110.75"};
    string HYSD0002[3]={"Alternador","Matrix","$150"};
    string HYSD0003[3]={"Masa mecanica","Pick up","$100"};

    string HYSE0001[3]={"Flujo de aire","Dodge","$50"};
    string HYSE0002[3]={"Flujo de aire","Chryler","$80"};
    string HYSE0003[3]={"Flujo de aire","Galant","$85"};

    string HYSEL0001[3]={"Alternador","Swit+","$300"};
    string HYSEL0002[3]={"Motor de arranque","Acura","$200"};
    string HYSEL0003[3]={"Power Stering","Celica","$150"};

//Productos marca ford
    string FOM0001[3]={"Culata completa WL-T","B2500","$500"};
    string FOM0002[3]={"Tapadera de distribucion 22R","Ford","$90"};
    string FOM0003[3]={"Carburador J15","1500","$200.50"};

    string FOS0001[3]={"Servo freno","Pick up","$150"};
    string FOS0002[3]={"Servo freno 22R","Pick up","$200"};
    string FOS0003[3]={"Servo freno","D21 Hardby","$200"};

    string FOSD0001[3]={"Compresor de aire","Marca234","110.75"};
    string FOSD0002[3]={"Masa mecanica","Pick up","$100"};
    string FOSD0003[3]={"Masa mecanica","Pick up","$70"};

    string FOSE0001[3]={"Compresor de aire acondicionado","Mystique","$200"};
    string FOSE0002[3]={"Compresor de aire","Contour","$250"};
    string FOSE0003[3]={"Compresor de aire","Scape","$225"};

    string FOSEL0001[3]={"Alternador","Swit+","$300"};
    string FOSEL0002[3]={"Alternador","Poliac Wave","$250"};
    string FOSEL0003[3]={"Alternador","Accent","$275"};

//Productos marca TOYOTA
    string TOM0001[3]={"Corona trasera","TOYOTA HIACE III","$150"};
    string TOM0002[3]={"Culata completa 22R","Pickup Hilux","$450"};
    string TOM0003[3]={"Corona trasera","Toyota Pickup 10X41","$250"};

    string TOS0001[3]={"Servo freno D21","Hardoby","$60"};
    string TOS0002[3]={"Servo freno","Toyota Hylux","$175"};
    string TOS0003[3]={"Corona trasera","Pick up","$200"};

    string TOSD0001[3]={"Alternador","Toyota Matrix","$150"};
    string TOSD0002[3]={"Masa mecanica","Pick up","$100"};
    string TOSD0003[3]={"Masa hidraulica","Pick up 4X4","$150"};

    string TOSE0001[3]={"Flujo de aire","Toyota hylux ","$60"};
    string TOSE0002[3]={"Compresor de aire acondicionado","Toyoa corolla","$250"};
    string TOSE0003[3]={"Compresor de aire","Marca234","110.75"};

    string TOSEL0001[3]={"Alternador","Toyota corolla 1.6 L4","$300"};
    string TOSEL0002[3]={"Alternador","Toyta corolla 1.8 L4","110.75"};
    string TOSEL0003[3]={"Alternador","Toyota corolla 1.8 L3","110.75"};

//Productos marca ISUZU
    string ISM0001[3]={"Motor de arranque","Celica","$200"};
    string ISM0002[3]={"Culata completa","H100","$350"};
    string ISM0003[3]={"Power Stering","Geo prizm","$200"};

    string ISS0001[3]={"Servo freno","Isuzu PUp","$150"};
    string ISS0002[3]={"Servo freno","D21 Hardby","$200"};
    string ISS0003[3]={"Cremallera hidraulica","200Sx","$90"};

    string ISSD0001[3]={"Masa mecanica","Pick up","$70"};
    string ISSD0002[3]={"Corona trasera","Pick up","$200"};
    string ISSD0003[3]={"Corona trasera","pick up 10X41","$250"};

    string ISSE0001[3]={"Compresor de aire acondicionado","Isuzu","110.75"};
    string ISSE0002[3]={"Flujo de aire","Doge Stratus","$60"};
    string ISSE0003[3]={"Flujo de aire","Tiburon","$60"};

    string ISSEL0001[3]={"Motor de arranque","Highlander","$150"};
    string ISSEL0002[3]={"Power Stering","Celica","$150"};
    string ISSEL0003[3]={"Motor de arranque","Acura","$200"};

//Productos otros
    string OTM0001[3]={"Para automoviles tipo sedan","ENER_MAX","$60"};
    string OTM0002[3]={"Para pick-up y microbuses","ENER_MAX","$100"};
    string OTM0003[3]={"Para vehiculo pesado","ENER_MAX","$150"};

    string OTS0001[3]={"Burro de embanque -3 ton","MAGIC TOOLS","$80"};
    string OTS0002[3]={"Mica hidraulica 30 ton","MAGIC TOOLS","$200"};
    string OTS0003[3]={"Buril neumatico","STANLEY","$40"};

    string OTSD0001[3]={"Llanta Grand-Premium ideal para toda temporada","Kinergy GT","$600"};
    string OTSD0002[3]={"Llanta de balance total","OPTIMO MEO2","$450"};
    string OTSD0003[3]={"La llanta Dynapro HP2 de alto rendimiento para SUVs de lujo","Dynapro HP2","$700"};

    string OTSE0001[3]={"Lubricante multigrado 10W-30","Mobil 1","$10"};
    string OTSE0002[3]={"Lubricante sintetico ESP Formula 5W-40","MMobil 1","$20"};
    string OTSE0003[3]={"Lubricante multigrado sintetico 5W.30","Mobil 1","$15"};

    string OTSEL0001[3]={"Filtro de aire","Camry Siena","$50"};
    string OTSEL0002[3]={"Filtro de aire 33-2247","Doge ram","$70"};
    string OTSEL0003[3]={"Motor y cabina filtro de aire ","Matrix Vibe","$150"};

    cout << "\t\t\t\t\t\t\tREPUESTOS MONRROY" << endl;

//Menú para selecccionar el marca de auto
    cout<< endl;
    cout<< endl;
    cout << "\t\t\t\tMarcas:" << endl;
    cout<< endl;
    cout << "\t\t\t1." << " HONDA\n";
    cout << "\t\t\t2." << " HYUNDAI\n";
    cout << "\t\t\t3." << " FORD\n";
    cout << "\t\t\t4." << " ISUZU\n";
    cout << "\t\t\t5." << " TOYOTA\n";
    cout << "\t\t\t6." << " OTROS\n";
    cout << "\t\t\t0." << " SALIR\n";
    cin >> opcion;
    system("cls");

    switch(opcion)
    {
        case 1: cout<< endl; cout<< endl;
        cout << "\t\t\tHONDA" << endl;
        cout<< endl;
        //Menú para selecccionar el tipo de repuesto
        cout << "Repuestos para la marca:" << endl;
        pausa();
        cout << "\t\t\t1." << "Motor\n";
        cout << "\t\t\t2." << "Sistema de frenos\n";
        cout << "\t\t\t3." << "Suspension y direccion\n";
        cout << "\t\t\t4." << "Sistema de enfriamiento\n";
        cout << "\t\t\t5." << "Sistema electrico\n";
        cout << "\t\t\t0." << "Salir\n";
        cin >> opcionSub;
        system("cls");

            switch (opcionSub)
            {
            case 1:
                cout << "\t\t\t" << "Motor" << endl;

                cout << "M0001" << " - "  << M0001[0] << " - " << M0001[1] << " - " << M0001[2] << endl;
                cout << endl;
                cout << "M0002" << " - "  << M0002[0] << " - " << M0002[1] << " - " << M0002[2] << endl;
                cout << endl;
                cout << "M0003" << " - "  << M0003[0] << " - " << M0003[1] << " - " << M0003[2] << endl;
                cout << endl;
                cout << endl;
                ultimaOpcion();

                pausa();
            break;

            case 2:
                cout << "\t\t\t" << "Sistema de frenos" << endl;

                cout << "S0001" << " - "  << S0001[0] << " - " << S0001[1] << " - " << S0001[2] << endl;
                cout << endl;
                cout << "S0002" << " - "  << S0002[0] << " - " << S0002[1] << " - " << S0002[2] << endl;
                cout << endl;
                cout << "S0003" << " - "  << S0003[0] << " - " << S0003[1] << " - " << S0003[2] << endl;
                cout << endl;
                cout << endl;
                ultimaOpcion();

                pausa();
            break;

             case 3:
                cout << "\t\t\t" << "Suspencion y direccion" << endl;

                cout << "SD0001" << " - "  << SD0001[0] << " - " << SD0001[1] << " - " << SD0001[2] << endl;
                cout << endl;
                cout << "SD0002" << " - "  << SD0002[0] << " - " << SD0002[1] << " - " << SD0002[2] << endl;
                cout << endl;
                cout << "SD0003" << " - "  << SD0003[0] << " - " << SD0003[1] << " - " << SD0003[2] << endl;
                cout << endl;
                cout << endl;
                ultimaOpcion();

                pausa();
            break;

            case 4:
                cout << "\t\t\t" << "Sistema de enfriamiento" << endl;

                cout << "SE0001" << " - "  << SE0001[0] << " - " << SE0001[1] << " - " << SE0001[2] << endl;
                cout << endl;
                cout << "SE0002" << " - "  << SE0002[0] << " - " << SE0002[1] << " - " << SE0002[2] << endl;
                cout << endl;
                cout << "SE0003" << " - "  << SE0003[0] << " - " << SE0003[1] << " - " << SE0003[2] << endl;
                cout << endl;
                cout << endl;
                ultimaOpcion();

                pausa();
            break;

            case 5:
                cout << "\t\t\t" << "Sistema electrico" << endl;

                cout << "SEL0001" << " - "  << SEL0001[0] << " - " << SEL0001[1] << " - " << SEL0001[2] << endl;
                cout << endl;
                cout << "SEL0002" << " - "  << SEL0002[0] << " - " << SEL0002[1] << " - " << SEL0002[2] << endl;
                cout << endl;
                cout << "SEL0003" << " - "  << SEL0003[0] << " - " << SEL0003[1] << " - " << SEL0003[2] << endl;
                cout << endl;
                cout << endl;
                ultimaOpcion();

                pausa();
            break;

                
            case 0:system("cls");
                despedida();
                break;
            }
        break;

        case 2: cout<< endl; cout<< endl;
        cout << "\t\t\tHYUNDAI" << endl;
        cout<< endl;

        //Menú para selecccionar el tipo de repuesto
        cout << "Repuestos para la marca:" << endl;
        pausa();
        cout << "\t\t\t1." << "Motor\n";
        cout << "\t\t\t2." << "Sistema de frenos\n";
        cout << "\t\t\t3." << "Suspension y direccion\n";
        cout << "\t\t\t4." << "Sistema de enfriamiento\n";
        cout << "\t\t\t5." << "Sistema electrico\n";
        cout << "\t\t\t0." << "Salir\n";
        cin >> opcionSub;
        system("cls");

            switch (opcionSub)
            {
            case 1:
                cout << "\t\t\t" << "Motor" << endl;

                cout << "HYM0001" << " - "  << HYM0001[0] << " - " << HYM0001[1] << " - " << HYM0001[2] << endl;
                cout << endl;
                cout << "HYM0002" << " - "  << HYM0002[0] << " - " << HYM0002[1] << " - " << HYM0002[2] << endl;
                cout << endl;
                cout << "HYM0003" << " - "  << HYM0003[0] << " - " << HYM0003[1] << " - " << HYM0003[2] << endl;
                cout << endl;
                cout << endl;
                ultimaOpcion();

                pausa();
            break;

            case 2:
                cout << "\t\t\t" << "Sistema de frenos" << endl;

                cout << "HYS0001" << " - "  << HYS0001[0] << " - " << HYS0001[1] << " - " << HYS0001[2] << endl;
                cout << endl;
                cout << "HYS0002" << " - "  << HYS0002[0] << " - " << HYS0002[1] << " - " << HYS0002[2] << endl;
                cout << endl;
                cout << "HYS0003" << " - "  << HYS0003[0] << " - " << HYS0003[1] << " - " << HYS0003[2] << endl;
                cout << endl;
                cout << endl;
                ultimaOpcion();

                pausa();
            break;

             case 3:
                cout << "\t\t\t" << "Suspencion y direccion" << endl;

                cout << "HYSD0001" << " - "  << HYSD0001[0] << " - " << HYSD0001[1] << " - " << HYSD0001[2] << endl;
                cout << endl;
                cout << "HYSD0002" << " - "  << HYSD0002[0] << " - " << HYSD0002[1] << " - " << HYSD0002[2] << endl;
                cout << endl;
                cout << "HYSD0003" << " - "  << HYSD0003[0] << " - " << HYSD0003[1] << " - " << HYSD0003[2] << endl;
                cout << endl;
                cout << endl;
                ultimaOpcion();

                pausa();
            break;

            case 4:
                cout << "\t\t\t" << "Sistema de enfriamiento" << endl;

                cout << "HYSE0001" << " - "  << HYSE0001[0] << " - " << HYSE0001[1] << " - " << HYSE0001[2] << endl;
                cout << endl;
                cout << "HYSE0002" << " - "  << HYSE0002[0] << " - " << HYSE0002[1] << " - " << HYSE0002[2] << endl;
                cout << endl;
                cout << "HYSE0003" << " - "  << HYSE0003[0] << " - " << HYSE0003[1] << " - " << HYSE0003[2] << endl;
                cout << endl;
                cout << endl;
                ultimaOpcion();

                pausa();
            break;

            case 5:
                cout << "\t\t\t" << "Sistema electrico" << endl;

                cout << "HYSEL0001" << " - "  << HYSEL0001[0] << " - " << HYSEL0001[1] << " - " << HYSEL0001[2] << endl;
                cout << endl;
                cout << "HYSEL0002" << " - "  << HYSEL0002[0] << " - " << HYSEL0002[1] << " - " << HYSEL0002[2] << endl;
                cout << endl;
                cout << "HYSEL0003" << " - "  << HYSEL0003[0] << " - " << HYSEL0003[1] << " - " << HYSEL0003[2] << endl;
                cout << endl;
                cout << endl;
                ultimaOpcion();

                pausa();
            break;

                
            case 0:system("cls");
                despedida();
                break;
            }
        break;


        case 3: cout<< endl; cout<< endl;
        cout << "\t\t\tFORD" << endl;
        cout<< endl;

        //Menú para selecccionar el tipo de repuesto
        cout << "Repuestos para la marca:" << endl;
        pausa();
        cout << "\t\t\t1." << "Motor\n";
        cout << "\t\t\t2." << "Sistema de frenos\n";
        cout << "\t\t\t3." << "Suspension y direccion\n";
        cout << "\t\t\t4." << "Sistema de enfriamiento\n";
        cout << "\t\t\t5." << "Sistema electrico\n";
        cout << "\t\t\t0." << "Salir\n";
        cin >> opcionSub;
        system("cls");

         switch (opcionSub)
            {
            case 1:
                cout << "\t\t\t" << "Motor" << endl;

                cout << "FOM0001" << " - "  << FOM0001[0] << " - " << FOM0001[1] << " - " << FOM0001[2] << endl;
                cout << endl;
                cout << "FOM0002" << " - "  << FOM0002[0] << " - " << FOM0002[1] << " - " << FOM0002[2] << endl;
                cout << endl;
                cout << "FOM0003" << " - "  << FOM0003[0] << " - " << FOM0003[1] << " - " << FOM0003[2] << endl;
                cout << endl;
                cout << endl;
                ultimaOpcion();

                pausa();
            break;

            case 2:
                cout << "\t\t\t" << "Sistema de frenos" << endl;

                cout << "FOS0001" << " - "  << FOS0001[0] << " - " << FOS0001[1] << " - " << FOS0001[2] << endl;
                cout << endl;
                cout << "FOS0002" << " - "  << FOS0002[0] << " - " << FOS0002[1] << " - " << FOS0002[2] << endl;
                cout << endl;
                cout << "FOS0003" << " - "  << FOS0003[0] << " - " << FOS0003[1] << " - " << FOS0003[2] << endl;
                cout << endl;
                cout << endl;
                ultimaOpcion();

                pausa();
            break;

             case 3:
                cout << "\t\t\t" << "Suspencion y direccion" << endl;

                cout << "FOSD0001" << " - "  << FOSD0001[0] << " - " << FOSD0001[1] << " - " << FOSD0001[2] << endl;
                cout << endl;
                cout << "FOSD0002" << " - "  << FOSD0002[0] << " - " << FOSD0002[1] << " - " << FOSD0002[2] << endl;
                cout << endl;
                cout << "FOSD0003" << " - "  << FOSD0003[0] << " - " << FOSD0003[1] << " - " << FOSD0003[2] << endl;
                cout << endl;
                cout << endl;
                ultimaOpcion();

                pausa();
            break;

            case 4:
                cout << "\t\t\t" << "Sistema de enfriamiento" << endl;

                cout << "FOSE0001" << " - "  << FOSE0001[0] << " - " << FOSE0001[1] << " - " << FOSE0001[2] << endl;
                cout << endl;
                cout << "FOSE0002" << " - "  << FOSE0002[0] << " - " << FOSE0002[1] << " - " << FOSE0002[2] << endl;
                cout << endl;
                cout << "FOSE0003" << " - "  << FOSE0003[0] << " - " << FOSE0003[1] << " - " << FOSE0003[2] << endl;
                cout << endl;
                cout << endl;
                ultimaOpcion();

                pausa();
            break;

            case 5:
                cout << "\t\t\t" << "Sistema electrico" << endl;

                cout << "FOSEL0001" << " - "  << FOSEL0001[0] << " - " << FOSEL0001[1] << " - " << FOSEL0001[2] << endl;
                cout << endl;
                cout << "FOSEL0002" << " - "  << FOSEL0002[0] << " - " << FOSEL0002[1] << " - " << FOSEL0002[2] << endl;
                cout << endl;
                cout << "FOSEL0003" << " - "  << FOSEL0003[0] << " - " << FOSEL0003[1] << " - " << FOSEL0003[2] << endl;
                cout << endl;
                cout << endl;
                ultimaOpcion();

                pausa();
            break;

                
            case 0:system("cls");
                despedida();
                break;
            }
        break;

        case 4: cout<< endl; cout<< endl;
        cout << "\t\t\tISUZU" << endl;
        cout<< endl;

        //Menú para selecccionar el tipo de repuesto
        cout << "Repuestos para la marca:" << endl;
        pausa();
        cout << "\t\t\t1." << "Motor\n";
        cout << "\t\t\t2." << "Sistema de frenos\n";
        cout << "\t\t\t3." << "Suspension y direccion\n";
        cout << "\t\t\t4." << "Sistema de enfriamiento\n";
        cout << "\t\t\t5." << "Sistema electrico\n";
        cout << "\t\t\t0." << "Salir\n";
        cin >> opcionSub;
        system("cls");

            switch (opcionSub)
            {
            case 1:
                cout << "\t\t\t" << "Motor" << endl;

                cout << "ISM0001" << " - "  << ISM0001[0] << " - " << ISM0001[1] << " - " << ISM0001[2] << endl;
                cout << endl;
                cout << "ISM0002" << " - "  << ISM0002[0] << " - " << ISM0002[1] << " - " << ISM0002[2] << endl;
                cout << endl;
                cout << "ISM0003" << " - "  << ISM0003[0] << " - " << ISM0003[1] << " - " << ISM0003[2] << endl;
                cout << endl;
                cout << endl;
                ultimaOpcion();

                pausa();
            break;

            case 2:
                cout << "\t\t\t" << "Sistema de frenos" << endl;

                cout << "ISS0001" << " - "  << ISS0001[0] << " - " << ISS0001[1] << " - " << ISS0001[2] << endl;
                cout << endl;
                cout << "ISS0002" << " - "  << ISS0002[0] << " - " << ISS0002[1] << " - " << ISS0002[2] << endl;
                cout << endl;
                cout << "ISS0003" << " - "  << ISS0003[0] << " - " << ISS0003[1] << " - " << ISS0003[2] << endl;
                cout << endl;
                cout << endl;
                ultimaOpcion();

                pausa();
            break;

             case 3:
                cout << "\t\t\t" << "Suspencion y direccion" << endl;

                cout << "ISSD0001" << " - "  << ISSD0001[0] << " - " << ISSD0001[1] << " - " << ISSD0001[2] << endl;
                cout << endl;
                cout << "ISSD0002" << " - "  << ISSD0002[0] << " - " << ISSD0002[1] << " - " << ISSD0002[2] << endl;
                cout << endl;
                cout << "ISSD0003" << " - "  << ISSD0003[0] << " - " << ISSD0003[1] << " - " << ISSD0003[2] << endl;
                cout << endl;
                cout << endl;
                ultimaOpcion();

                pausa();
            break;

            case 4:
                cout << "\t\t\t" << "Sistema de enfriamiento" << endl;

                cout << "ISSE0001" << " - "  << ISSE0001[0] << " - " << ISSE0001[1] << " - " << ISSE0001[2] << endl;
                cout << endl;
                cout << "ISSE0002" << " - "  << ISSE0002[0] << " - " << ISSE0002[1] << " - " << ISSE0002[2] << endl;
                cout << endl;
                cout << "ISSE0003" << " - "  << ISSE0003[0] << " - " << ISSE0003[1] << " - " << ISSE0003[2] << endl;
                cout << endl;
                cout << endl;
                ultimaOpcion();

                pausa();
            break;

            case 5:
                cout << "\t\t\t" << "Sistema electrico" << endl;

                cout << "ISSEL0001" << " - "  << ISSEL0001[0] << " - " << ISSEL0001[1] << " - " << ISSEL0001[2] << endl;
                cout << endl;
                cout << "ISSEL0002" << " - "  << ISSEL0002[0] << " - " << ISSEL0002[1] << " - " << ISSEL0002[2] << endl;
                cout << endl;
                cout << "ISSEL0003" << " - "  << ISSEL0003[0] << " - " << ISSEL0003[1] << " - " << ISSEL0003[2] << endl;
                cout << endl;
                cout << endl;
                ultimaOpcion();

                pausa();
            break;

                
            case 0:system("cls");
                despedida();
                break;
            }
        break;

        case 5: cout<< endl; cout<< endl;
        cout << "\t\t\tTOYOTA" << endl;
        cout<< endl;

        //Menú para selecccionar el tipo de repuesto
        cout << "Repuestos para la marca:" << endl;
        pausa();
        cout << "\t\t\t1." << "Motor\n";
        cout << "\t\t\t2." << "Sistema de frenos\n";
        cout << "\t\t\t3." << "Suspension y direccion\n";
        cout << "\t\t\t4." << "Sistema de enfriamiento\n";
        cout << "\t\t\t5." << "Sistema electrico\n";
        cout << "\t\t\t0." << "Salir\n";
        cin >> opcionSub;
        system("cls");

            switch (opcionSub)
            {
            case 1:
                cout << "\t\t\t" << "Motor" << endl;

                cout << "TOM0001" << " - "  << TOM0001[0] << " - " << TOM0001[1] << " - " << TOM0001[2] << endl;
                cout << endl;
                cout << "TOM0002" << " - "  << TOM0002[0] << " - " << TOM0002[1] << " - " << TOM0002[2] << endl;
                cout << endl;
                cout << "TOM0003" << " - "  << TOM0003[0] << " - " << TOM0003[1] << " - " << TOM0003[2] << endl;
                cout << endl;
                cout << endl;
                ultimaOpcion();

                pausa();
            break;

            case 2:
                cout << "\t\t\t" << "Sistema de frenos" << endl;

                cout << "TOS0001" << " - "  << TOS0001[0] << " - " << TOS0001[1] << " - " << TOS0001[2] << endl;
                cout << endl;
                cout << "TOS0002" << " - "  << TOS0002[0] << " - " << TOS0002[1] << " - " << TOS0002[2] << endl;
                cout << endl;
                cout << "TOS0003" << " - "  << TOS0003[0] << " - " << TOS0003[1] << " - " << TOS0003[2] << endl;
                cout << endl;
                cout << endl;
                ultimaOpcion();

                pausa();
            break;

             case 3:
                cout << "\t\t\t" << "Suspencion y direccion" << endl;

                cout << "TOSD0001" << " - "  << TOSD0001[0] << " - " << TOSD0001[1] << " - " << TOSD0001[2] << endl;
                cout << endl;
                cout << "TOSD0002" << " - "  << TOSD0002[0] << " - " << TOSD0002[1] << " - " << TOSD0002[2] << endl;
                cout << endl;
                cout << "TOSD0003" << " - "  << TOSD0003[0] << " - " << TOSD0003[1] << " - " << TOSD0003[2] << endl;
                cout << endl;
                cout << endl;
                ultimaOpcion();

                pausa();
            break;

            case 4:
                cout << "\t\t\t" << "Sistema de enfriamiento" << endl;

                cout << "TOSE0001" << " - "  << TOSE0001[0] << " - " << TOSE0001[1] << " - " << TOSE0001[2] << endl;
                cout << endl;
                cout << "TOSE0002" << " - "  << TOSE0002[0] << " - " << TOSE0002[1] << " - " << TOSE0002[2] << endl;
                cout << endl;
                cout << "TOSE0003" << " - "  << TOSE0003[0] << " - " << TOSE0003[1] << " - " << TOSE0003[2] << endl;
                cout << endl;
                cout << endl;
                ultimaOpcion();

                pausa();
            break;

            case 5:
                cout << "\t\t\t" << "Sistema electrico" << endl;

                cout << "TOSEL0001" << " - "  << TOSEL0001[0] << " - " << TOSEL0001[1] << " - " << TOSEL0001[2] << endl;
                cout << endl;
                cout << "TOSEL0002" << " - "  << TOSEL0002[0] << " - " << TOSEL0002[1] << " - " << TOSEL0002[2] << endl;
                cout << endl;
                cout << "TOSEL0003" << " - "  << TOSEL0003[0] << " - " << TOSEL0003[1] << " - " << TOSEL0003[2] << endl;
                cout << endl;
                cout << endl;
                ultimaOpcion();

                pausa();
            break;

                
            case 0:system("cls");
                despedida();
                break;
            }
        break;

        case 6: cout<< endl; cout<< endl;
        cout << "\t\t\tOTROS" << endl;

        //Menú para selecccionar el tipo de repuesto
        cout << "\t\t\t1." << "\tBaterias\n";
        cout << "\t\t\t2." << "\tHerramientas\n";
        cout << "\t\t\t3." << "\tLlantas\n";
        cout << "\t\t\t4." << "\tLubricantes\n";
        cout << "\t\t\t5." << "\tFiltros\n";
        cin >> opcionSub;

        system("cls");

            switch (opcionSub)
            {
            case 1:
                cout << "\t\t\t" << "Baterias" << endl;

                cout << "OTM0001" << " - "  << OTM0001[0] << " - " << OTM0001[1] << " - " << OTM0001[2] << endl;
                cout << endl;
                cout << "OTM0002" << " - "  << OTM0002[0] << " - " << OTM0002[1] << " - " << OTM0002[2] << endl;
                cout << endl;
                cout << "OTM0003" << " - "  << OTM0003[0] << " - " << OTM0003[1] << " - " << OTM0003[2] << endl;
                cout << endl;
                cout << endl;
                ultimaOpcion();

                pausa();
            break;

            case 2:
                cout << "\t\t\t" << "Herramientas" << endl;

                cout << "OTS0001" << " - "  << OTS0001[0] << " - " << OTS0001[1] << " - " << OTS0001[2] << endl;
                cout << endl;
                cout << "OTS0002" << " - "  << OTS0002[0] << " - " << OTS0002[1] << " - " << OTS0002[2] << endl;
                cout << endl;
                cout << "OTS0003" << " - "  << OTS0003[0] << " - " << OTS0003[1] << " - " << OTS0003[2] << endl;
                cout << endl;
                cout << endl;
                ultimaOpcion();

                pausa();
            break;

             case 3:
                cout << "\t\t\t" << "Llantas" << endl;

                cout << "OTSD0001" << " - "  << OTSD0001[0] << " - " << OTSD0001[1] << " - " << OTSD0001[2] << endl;
                cout << endl;
                cout << "OTSD0002" << " - "  << OTSD0002[0] << " - " << OTSD0002[1] << " - " << OTSD0002[2] << endl;
                cout << endl;
                cout << "OTSD0003" << " - "  << OTSD0003[0] << " - " << OTSD0003[1] << " - " << OTSD0003[2] << endl;
                cout << endl;
                cout << endl;
                ultimaOpcion();

                pausa();
            break;

            case 4:
                cout << "\t\t\t" << "Lubricantes" << endl;

                cout << "OTSE0001" << " - "  << OTSE0001[0] << " - " << OTSE0001[1] << " - " << OTSE0001[2] << endl;
                cout << endl;
                cout << "OTSE0002" << " - "  << OTSE0002[0] << " - " << OTSE0002[1] << " - " << OTSE0002[2] << endl;
                cout << endl;
                cout << "OTSE0003" << " - "  << OTSE0003[0] << " - " << OTSE0003[1] << " - " << OTSE0003[2] << endl;
                cout << endl;
                cout << endl;
                ultimaOpcion();

                pausa();
            break;

            case 5:
                cout << "\t\t\t" << "Filtros" << endl;

                cout << "OTSEL0001" << " - "  << OTSEL0001[0] << " - " << OTSEL0001[1] << " - " << OTSEL0001[2] << endl;
                cout << endl;
                cout << "OTSEL0002" << " - "  << OTSEL0002[0] << " - " << OTSEL0002[1] << " - " << OTSEL0002[2] << endl;
                cout << endl;
                cout << "OTSEL0003" << " - "  << OTSEL0003[0] << " - " << OTSEL0003[1] << " - " << OTSEL0003[2] << endl;
                cout << endl;
                cout << endl;
                ultimaOpcion();

                pausa();
            break;

                
            case 0:system("cls");
                despedida();
                break;
            }
        break;

        case 0:system("cls");
                despedida();
        break;
    }


    return 0;
}

// Codigo que ejecuta una pausa en el sistema
void pausa()
{
    cout << "\t\t\tContinuar...\n";
    getwchar();
    getwchar();
}

//Codigo que nos presenta una despedida
void despedida()
{
    system("cls");
    cout<< endl;
    cout<< endl;
    cout<< endl;
    cout<< endl;
    cout<< endl;
    cout<< endl;
    cout<< endl;
    cout<< endl;
    cout<< endl;
    cout<< endl;
    cout << "\t\t\t\t\t\tGracias por vistarnos!!!!" << endl;
    cout<< endl;
    cout<< endl;
    cout<< endl;
    cout<< endl;
    cout<< endl;
    cout<< endl;
    cout<< endl;
    cout<< endl;
    cout<< endl;
    cout<< endl;
    cout<< endl;
    cout<< endl;
    pausa();
}

//Codigo crea una factura con los datos ingresados por el usuario
void factura()
{
    system("cls");
    int numeroProductos, nitCliente, contador = 1;
    float descuento = 0, precioProducto[20],  cantidad[20], totalPagar = 0, total = 0, totalIva = 0;
    char  nombreCliente[50];
    string nombreProducto[20];
    time_t my_time =time(NULL);
    

    cout << "\t\t\t\t\t\t\tProceso de Compra" << endl;

    cout << "Ingrese el nombre del cliente:" << endl;
    cin >> nombreCliente;
  

    cout << "Ingrese el nit del cliente(sin guiones ni espacios):" << endl;
    cin >> nitCliente;
   

    cout << "Cantidad de productos a facturar:" << endl;
    cin >> numeroProductos;

    //Permite el ingreso de los datos de los productos
    do
    {
    cout << "Ingrese nombre del producto  #" << contador << endl;
    cin >> nombreProducto[contador];

    cout << "Ingrese precio del producto  #" << contador << endl;
    cin >> precioProducto[contador];

    cout << "Cantidad compradas del producto #" << contador << endl;
    cin >> cantidad[contador];

    contador++;
    } while (contador <= numeroProductos);
    
     //Imprime la factura en pantalla
    system("cls");
    cout << endl;
    cout << "\t*********************************************   FACTURA   *********************************************" << endl;
    cout << endl;

    cout << "\t\tNombre del cliente: " << nombreCliente << "\t\t\t\t\t\tNit: " << nitCliente << endl;
    cout << endl;
    cout << "\t-----------------------------------------------------------------------------------------------" << endl;
    cout << endl;
    cout << "\t\t" << "Cantidad" << "     " << "Producto "<< "\t\t\t\t" << "Precio" << endl;
    
    for (int i = 1; i <= numeroProductos; i++)
    {
        cout << "\t\t" << cantidad[i] << "          " << nombreProducto[i] << "\t\t\t\t" << precioProducto[i] << endl;

    }

    cout << "\t-----------------------------------------------------------------------------------------------" << endl;
    //Calcula el total  
    for (int i = 1; i <= numeroProductos; i++)
    {
       total = total + (precioProducto[i] * cantidad[i]); 
    }
    //Calcula el descuento en funcion del total
    if (total >= 50)
    {
        descuento = total*0.10;
    }
    else if (total >= 75)
    {
        descuento = total*0.15;
    }
    else if (total >= 100)
    {
        descuento = total*0.20;
    }
    else if (total >= 500)
    {
        descuento = total*0.30;
    }
    else if (total >= 1000)
    {
        descuento = total*0.50;
    }
    else
    {
        descuento = 0;
    }

    totalIva = total + (total*0.13);
    totalPagar = totalIva - descuento;

    cout << "\t\tTotal:" << "\t\t\t\t\t\t\t" << total << endl;
    cout << endl;
    cout << "\t\tTotal con IVA:" << "\t\t\t\t\t\t" << totalIva << endl;
    cout << endl;
    cout << "\t\tDescuento:" << "\t\t\t\t\t\t" << descuento << endl;
    cout << endl;
    cout << "\t\tTotal a pagar:" << "\t\t\t\t\t\t" << totalPagar << endl;
    cout << endl;
    cout << endl;
    cout << endl;
    printf("%s", ctime(&my_time));
}
//Codigo que imprime el ultimo menu despues de presentar los productos
void ultimaOpcion(){
    int opcionFinal;
    cout << "1."<< "Crear factura digital" << endl;
    cout << "2." << "Salir" << endl;
    cin >> opcionFinal;

    switch (opcionFinal)
    {
    case 1: factura();
    break;

    case 2: despedida();  
    break;   
    }
}