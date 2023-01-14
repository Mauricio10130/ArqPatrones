package Producto;

import ProductoAbstracto.Fecha;

/**
 *
 * @author M
 */
public class FechaBolivia extends Fecha {

    public FechaBolivia(int Dia, String Mes, int Año) {
        super(Dia, Mes, Año);
    }

    @Override
    public String MostrarDato() {
       // return (Dia + " / " + Mes + " / " + Año);
       return (Año + " / " + Mes + " / " + Dia);
        
    }

}
