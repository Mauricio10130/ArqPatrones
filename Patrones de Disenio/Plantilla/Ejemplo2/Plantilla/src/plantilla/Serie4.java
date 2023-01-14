
package plantilla;

/**
 *
 * @author Estudiante
 */
public class Serie4 extends Series  {
    public Serie4(int cant){
       super.setCantidad(cant);
    }

    @Override
    protected int calcular_termino(int i) {
        return i*2-1;
    }
    
}
