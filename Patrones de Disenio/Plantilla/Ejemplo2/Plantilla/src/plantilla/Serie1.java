package plantilla;
//1+2+3+4+5+...........+n

/**
 *
 * @author Miguel Angel
 */
public class Serie1 extends Series{
    
    public Serie1(int cant){
       super.setCantidad(cant);
    }

    @Override
    protected int calcular_termino(int i) {
        int c=1;
        int v;
        if (i == 1) return c;    
        for (int j=1; j<i; j++)
              c = c+1;
              v = c * c;
        return v;  
    }
    
}
