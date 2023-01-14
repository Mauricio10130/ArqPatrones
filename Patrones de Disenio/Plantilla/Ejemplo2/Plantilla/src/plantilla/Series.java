package plantilla;
/**
 *
 * @author Miguel Angel
 */
public abstract class Series {
    
    protected String mensaje="";
    protected int cantidad;
    protected int F;    
    // Metodo plantilla - template method
    protected String mostrarSerie(){
        F=0;
        for (int i = 1; i <= cantidad; i++) {
            F= F + calcular_termino(i);
            if (i< cantidad)
                   mensaje = mensaje + calcular_termino(i) + " + ";         
            else
                mensaje = mensaje + calcular_termino(i) + " ; ";         
            
        }        
        return mensaje+ " Sumatoria= "+F;
       // System.out.println(mensaje);
    }    
    //Operacion()
    protected abstract int calcular_termino(int i);
    
    //metodos propios de la clase
    public void setCantidad(int cant){
        this.cantidad = cant;
    }
    public int getCantidad(){
        return cantidad;                
    }
}
