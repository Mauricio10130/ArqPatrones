package Producto;

import ProductoAbstracto.Nombre;

/**
 *
 * @author M
 */
public class NombreBolivia extends Nombre {

    public NombreBolivia(String Nombre, String ApellidoP, String ApellidoM) {
        super(Nombre, ApellidoP, ApellidoM);
    }

    @Override
    public String MostrarDato() {
        return (Nombre + " " + ApellidoP + " " + ApellidoM);
    }

}
