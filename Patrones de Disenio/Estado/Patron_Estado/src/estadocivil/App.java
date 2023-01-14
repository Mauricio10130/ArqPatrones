package estadocivil;

import estadocivil.context.Persona;
import javax.swing.JOptionPane;

public class App extends javax.swing.JFrame {
  private Persona persona;
  
  public App(){
    persona = new Persona();
    initComponents();
  }

  /**
   * This method is called from within the constructor to initialize the form.
   * WARNING: Do NOT modify this code. The content of this method is always
   * regenerated by the Form Editor.
   */
  @SuppressWarnings("unchecked")
  // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
  private void initComponents() {

    jLabel1 = new javax.swing.JLabel();
    jButton1 = new javax.swing.JButton();
    jButton2 = new javax.swing.JButton();
    jButton3 = new javax.swing.JButton();
    jButton4 = new javax.swing.JButton();

    setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);

    jLabel1.setFont(new java.awt.Font("Segoe UI", 0, 36)); // NOI18N
    jLabel1.setText("ESTADO CIVIL");

    jButton1.setFont(new java.awt.Font("Segoe UI", 0, 24)); // NOI18N
    jButton1.setText("Soltero");
    jButton1.addActionListener(new java.awt.event.ActionListener() {
      public void actionPerformed(java.awt.event.ActionEvent evt) {
        jButton1ActionPerformed(evt);
      }
    });

    jButton2.setFont(new java.awt.Font("Segoe UI", 0, 24)); // NOI18N
    jButton2.setText("Casado");
    jButton2.addActionListener(new java.awt.event.ActionListener() {
      public void actionPerformed(java.awt.event.ActionEvent evt) {
        jButton2ActionPerformed(evt);
      }
    });

    jButton3.setFont(new java.awt.Font("Segoe UI", 0, 24)); // NOI18N
    jButton3.setText("Divorciado");
    jButton3.addActionListener(new java.awt.event.ActionListener() {
      public void actionPerformed(java.awt.event.ActionEvent evt) {
        jButton3ActionPerformed(evt);
      }
    });

    jButton4.setFont(new java.awt.Font("Segoe UI", 0, 24)); // NOI18N
    jButton4.setText("Viudo");
    jButton4.addActionListener(new java.awt.event.ActionListener() {
      public void actionPerformed(java.awt.event.ActionEvent evt) {
        jButton4ActionPerformed(evt);
      }
    });

    javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
    getContentPane().setLayout(layout);
    layout.setHorizontalGroup(
      layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
      .addGroup(layout.createSequentialGroup()
        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
          .addGroup(layout.createSequentialGroup()
            .addGap(352, 352, 352)
            .addComponent(jLabel1, javax.swing.GroupLayout.PREFERRED_SIZE, 311, javax.swing.GroupLayout.PREFERRED_SIZE))
          .addGroup(layout.createSequentialGroup()
            .addGap(102, 102, 102)
            .addComponent(jButton1)
            .addGap(73, 73, 73)
            .addComponent(jButton2)
            .addGap(54, 54, 54)
            .addComponent(jButton3)
            .addGap(62, 62, 62)
            .addComponent(jButton4)))
        .addContainerGap(131, Short.MAX_VALUE))
    );
    layout.setVerticalGroup(
      layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
      .addGroup(layout.createSequentialGroup()
        .addGap(53, 53, 53)
        .addComponent(jLabel1)
        .addGap(92, 92, 92)
        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
          .addComponent(jButton1)
          .addComponent(jButton2)
          .addComponent(jButton3)
          .addComponent(jButton4))
        .addContainerGap(315, Short.MAX_VALUE))
    );

    pack();
  }// </editor-fold>//GEN-END:initComponents

    private void jButton1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton1ActionPerformed
      persona.solteros();
      JOptionPane.showMessageDialog(this, persona.getMensaje());
      System.out.println(persona.getMensaje());
    }//GEN-LAST:event_jButton1ActionPerformed

    private void jButton2ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton2ActionPerformed
      persona.casarse();
      JOptionPane.showMessageDialog(this, persona.getMensaje());
      System.out.println(persona.getMensaje());
    }//GEN-LAST:event_jButton2ActionPerformed

    private void jButton3ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton3ActionPerformed
      persona.divorciarse();
      JOptionPane.showMessageDialog(this, persona.getMensaje());
      System.out.println(persona.getMensaje());
    }//GEN-LAST:event_jButton3ActionPerformed

    private void jButton4ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton4ActionPerformed
      persona.enviudar();
      JOptionPane.showMessageDialog(this, persona.getMensaje());
      System.out.println(persona.getMensaje());
    }//GEN-LAST:event_jButton4ActionPerformed

  /**
   * @param args the command line arguments
   */
  public static void main(String args[]) {
    java.awt.EventQueue.invokeLater(new Runnable() {
      public void run() {
        new App().setVisible(true);
      }
    });
  }

  // Variables declaration - do not modify//GEN-BEGIN:variables
  private javax.swing.JButton jButton1;
  private javax.swing.JButton jButton2;
  private javax.swing.JButton jButton3;
  private javax.swing.JButton jButton4;
  private javax.swing.JLabel jLabel1;
  // End of variables declaration//GEN-END:variables
}
