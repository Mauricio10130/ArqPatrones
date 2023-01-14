package Producto;

import ProductoAbstracto.Nombre;

/**
 *
 * @author M
 */
public class NombreJapon extends Nombre {

    public NombreJapon(String Nombre, String ApellidoP, String ApellidoM) {
        super(Nombre, ApellidoP, ApellidoM);
    }

    @Override
    public String MostrarDato() {
        return Nombre + " " + ApellidoP;
    }

}
