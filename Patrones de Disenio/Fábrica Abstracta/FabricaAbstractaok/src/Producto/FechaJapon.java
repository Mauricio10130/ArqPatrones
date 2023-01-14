package Producto;

import ProductoAbstracto.Fecha;

/**
 *
 * @author M
 */
public class FechaJapon extends Fecha {

    public FechaJapon(int Dia, String Mes, int Año) {
        super(Dia, Mes, Año);
    }

    @Override
    public String MostrarDato() {
        return Año + "-" + Mes + "-" + Dia;
    }

}
