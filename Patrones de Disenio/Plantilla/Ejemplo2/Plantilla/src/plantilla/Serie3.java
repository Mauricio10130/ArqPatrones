package plantilla;
/**
 *
 * @author Miguel Angel
 */

//1+10+100+1000+10000+…………+N

public class Serie3 extends Series {
    public Serie3(int cant){
        super.setCantidad(cant);
    }

    @Override
    protected int calcular_termino(int i) {
         int c=1;        
        if (i == 1) return c;        
       for (int j=1; j<i; j++)
              c= c*10;
        return c;        
    }
    
}
