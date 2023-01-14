/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package patroncadenaderesponsabilidad;

import javax.swing.JOptionPane;

/**
 *
 * @author omair
 */
public class Billete200Bs extends Gestor{
    
    @Override
    protected int SolicitaNext() {
      int resto = cantidad %200;   /*100*/ 
      int restoCambio = cantidad / 200;    /*2*/
      if(restoCambio > 0){
          this.mensajeCantidad =  restoCambio + " X 200 BS\n";
      }
      return  resto;
    }
    
}
