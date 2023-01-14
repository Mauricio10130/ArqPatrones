/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author HP
 */
public class Triangulo implements Figura {
    private float altura;
    private float base;
    
    public Triangulo(float altura, float base)
    {
        this.base = base;
        this.altura = altura;
    }
    
    public float calcularArea()
    {
         return (base * altura) / 2;
    }
    
}
