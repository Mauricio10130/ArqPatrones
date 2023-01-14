package patronmemento;

import java.util.ArrayList;


public class Caretaker {
    
    private ArrayList<Memento> estados = new ArrayList<>();
    private int index;
    
    public Caretaker() {
        this.estados = new ArrayList<>();
        this.index = -1;
    }

    public void addMemento(Memento m){
        estados.add(m);
        this.index++;
    }
    
    public Memento Anterior(){
        if(index > 0){
            index--;
            return estados.get(index);
        }else{
            return null;
        }
    }
    
    public Memento Siguiente(){
        if(index < estados.size()-1){
            index++;
            return estados.get(index);
        }else{
            return null;
        }
    }
      
    public Memento getMemento(int index){
        return estados.get(index);
    }
    
}
