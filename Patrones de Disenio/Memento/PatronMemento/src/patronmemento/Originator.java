package patronmemento;


public class Originator {
    
    private String Palabra;

    public String getPalabra() {
        return Palabra;
    }

    public void setPalabra(String palabra) {
        this.Palabra = palabra;
    }
      
    
    public Memento CrearMemento(){
        return new Memento(Palabra);
    }
    
    public Object RestaurarMemento(Memento memento){
        Object palabra=(memento.getPalabra());
        return palabra;
    }  
    
}
