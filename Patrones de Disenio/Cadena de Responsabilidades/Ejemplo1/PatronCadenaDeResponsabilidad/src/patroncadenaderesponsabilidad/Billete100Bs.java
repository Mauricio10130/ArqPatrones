/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package patroncadenaderesponsabilidad;

import javax.swing.JOptionPane;
import javax.swing.JTextArea;

/**
 *
 * @author omair
 */
public class Billete100Bs extends Gestor{

    @Override
    protected int SolicitaNext() {
     int resto = cantidad%100;  /*0*/
     int restoCambio = cantidad/100;   /*1*/
    
     if(restoCambio > 0){
         this.mensajeCantidad =  restoCambio + "X100 BS \n";
     }
     return  resto;
    }
    
}
