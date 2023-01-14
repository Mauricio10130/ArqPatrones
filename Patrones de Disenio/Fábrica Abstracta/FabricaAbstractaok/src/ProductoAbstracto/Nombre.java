package ProductoAbstracto;

/**
 *
 * @author M
 */
public abstract class Nombre {

    protected String Nombre;
    protected String ApellidoP;
    protected String ApellidoM;

    public Nombre(String Nombre, String ApellidoP, String ApellidoM) {
        this.Nombre = Nombre;
        this.ApellidoP = ApellidoP;
        this.ApellidoM = ApellidoM;
    }

    public abstract String MostrarDato();
}
