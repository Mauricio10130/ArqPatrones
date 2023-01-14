package FabricaAbstracta;

import ProductoAbstracto.Fecha;
import ProductoAbstracto.Nombre;

/**
 *
 * @author M
 */
public interface DatosPersonales {

    Fecha CrearFecha(int dia, String mes, int año);

    Nombre CrearNombre(String nombre, String apellidoP, String apellidoM);
}
