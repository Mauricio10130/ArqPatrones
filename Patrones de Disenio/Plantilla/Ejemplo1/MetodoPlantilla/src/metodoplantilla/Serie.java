package metodoplantilla;

import java.awt.List;
import java.util.ArrayList;

public abstract class Serie {
    ArrayList<Integer> lista = new ArrayList<Integer>();
    int serie;
    int va;
    
    public abstract void siguiente();
    
    public ArrayList<Integer> generarSerie(int n){
        lista.clear();
        serie = 1; va = serie;
        
        int c = 1;
        while(c <= n){
            lista.add(va);
            siguiente();
            
            c++;
        }
        return lista;
    }
}
