/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author HP
 */
public class Circulo implements Figura{
    private float radio;
    
    public Circulo(float radio)
    {
        this.radio = radio;
    }
    
   public float calcularArea()
   {
       return (float) (Math.PI * Math.pow(radio, 2));
   }; 
}
