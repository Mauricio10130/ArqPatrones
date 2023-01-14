package Producto;

import ProductoAbstracto.Nombre;

/**
 *
 * @author M
 */
public class NombreUSA extends Nombre {

    public NombreUSA(String Nombre, String ApellidoP, String ApellidoM) {
        super(Nombre, ApellidoP, ApellidoM);
    }

    @Override
    public String MostrarDato() {

        String apm = Character.toString(ApellidoM.charAt(0));
        return Nombre + " " + apm + ". " + ApellidoP;
    }

}
