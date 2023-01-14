package FabricaConcreta;

import FabricaAbstracta.DatosPersonales;
import Producto.FechaJapon;
import Producto.NombreJapon;
import ProductoAbstracto.Fecha;
import ProductoAbstracto.Nombre;

/**
 *
 * @author M
 */
public class DPJapon implements DatosPersonales {

    @Override
    public Fecha CrearFecha(int dia, String mes, int año) {
        return new FechaJapon(dia, mes, año);
    }

    @Override
    public Nombre CrearNombre(String nombre, String apellidoP, String apellidoM) {
        return new NombreJapon(nombre, apellidoP, apellidoM);
    }

}
