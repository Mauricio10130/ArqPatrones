package FabricaConcreta;

import FabricaAbstracta.DatosPersonales;
import Producto.FechaUSA;
import Producto.NombreUSA;
import ProductoAbstracto.Fecha;
import ProductoAbstracto.Nombre;

/**
 *
 * @author M
 */
public class DPUSA implements DatosPersonales {

    @Override
    public Fecha CrearFecha(int dia, String mes, int año) {
        return new FechaUSA(dia, mes, año);
    }

    @Override
    public Nombre CrearNombre(String nombre, String apellidoP, String apellidoM) {
        return new NombreUSA(nombre, apellidoP, apellidoM);
    }

}
