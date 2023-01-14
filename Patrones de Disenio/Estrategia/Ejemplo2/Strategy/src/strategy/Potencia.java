/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package strategy;

/**
 *
 * @author Moises
 */
public class Potencia implements IAritmetica{

    public Potencia() {
    }
    @Override
     public int Operacion(int a, int b)
    {   
        return a * a+b*b;
        /*double aa=a;
        double bb=a;
        double cc=Math.pow(aa, bb);
        //return (int)Math.round(cc);
        return (int)cc;
        //return (int)Math.pow(aa, bb);*/
    } 
}
