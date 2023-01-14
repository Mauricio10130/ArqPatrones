package FabricaConcreta;

import FabricaAbstracta.DatosPersonales;
import Producto.FechaBolivia;
import Producto.NombreBolivia;
import ProductoAbstracto.Fecha;
import ProductoAbstracto.Nombre;

/**
 *
 * @author M
 */
public class DPBolivia implements DatosPersonales {

    @Override
    public Fecha CrearFecha(int dia, String mes, int año) {
        return new FechaBolivia(dia, mes, año);
    }

    @Override
    public Nombre CrearNombre(String nombre, String apellidoP, String apellidoM) {
        return new NombreBolivia(nombre, apellidoP, apellidoM);
    }

}
