package ProductoAbstracto;

/**
 *
 * @author M
 */
public abstract class Fecha {

    protected int Dia;
    protected String Mes;
    protected int Año;

    public Fecha(int Dia, String Mes, int Año) {
        this.Dia = Dia;
        this.Mes = Mes;
        this.Año = Año;
    }

    public abstract String MostrarDato();
}
