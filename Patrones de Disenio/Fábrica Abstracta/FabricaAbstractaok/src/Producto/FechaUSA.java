package Producto;

import ProductoAbstracto.Fecha;

/**
 *
 * @author M
 */
public class FechaUSA extends Fecha {

    public FechaUSA(int Dia, String Mes, int Año) {
        super(Dia, Mes, Año);
    }

    @Override
    public String MostrarDato() {
        return Mes + "-" + Dia + "-" + Año;
    }

}
