package plantilla;
/**
 *
 * @author Miguel Angel
 */
//10+20+30+....+n 
public class Serie2 extends Series {
   
    public Serie2(int cant)
    {
        super.setCantidad(cant);
    }
    
    @Override
    protected int calcular_termino(int i) {
       return i * 10;
    }
    
}
