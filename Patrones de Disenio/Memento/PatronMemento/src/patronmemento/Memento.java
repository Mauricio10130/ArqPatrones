package patronmemento;


public class Memento {
    
    private Object Palabra; 
    
    
    public Memento(Object palabra){
        this.Palabra=palabra;
        
    }

    public Object getPalabra() {
        return Palabra;
    }

    public void setPalabra(Object palabra) {
        this.Palabra = palabra;
    }
    
}
