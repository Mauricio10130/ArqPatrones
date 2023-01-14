/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package patroncadenaderesponsabilidad;

/**
 *
 * @author omair
 */
public abstract class Gestor {
   
    protected Gestor siguiente;
    protected int cantidad;
    protected String mensajeCantidad = "";
   
    protected abstract int SolicitaNext(); 
    
    public void setGestor(Gestor mo){
        this.siguiente = mo;
    }
    public String SolicitarSiguiente(int cantidad){  /*100 - 0*/  
        this.cantidad = cantidad; 
        int resultado = this.SolicitaNext(); 
        String mensaje = "";
        if(resultado != 0){
            mensaje = siguiente.SolicitarSiguiente(resultado); 
        }
        return  this.mensajeCantidad +  "\n"+ mensaje;
    }
}
