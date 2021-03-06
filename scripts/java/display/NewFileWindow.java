/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package display;

import display.listener.WizardEventEmitter;
import display.listener.WizardListener;

/**
 *
 * @author SERVER
 */
public class NewFileWindow extends javax.swing.JDialog {

	private static final long serialVersionUID = 1L;
	private WizardEventEmitter we;
	
	public NewFileWindow(java.awt.Frame parent, boolean modal) {
        super(parent, modal);
        initComponents();
        we = new WizardEventEmitter();
        this.setLocationRelativeTo(null);
    }
	
	 public void addListener(WizardListener l)
		{
			we.addListener(l);
		}

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        closeButton = new javax.swing.JButton();
        validButton = new javax.swing.JButton();
        labelXml = new javax.swing.JLabel();
        labelDirectory = new javax.swing.JLabel();
        inputXml = new javax.swing.JTextField();
        browseXmlButton = new javax.swing.JButton();
        inputDirectory = new javax.swing.JTextField();
        browseDirectoryButton = new javax.swing.JButton();

        setDefaultCloseOperation(javax.swing.WindowConstants.DISPOSE_ON_CLOSE);
        setTitle("New File");

        closeButton.setText("Cancel");

        validButton.setText("Ok");

        labelXml.setText("Xml destination:");

        labelDirectory.setText("File directory:");

        browseXmlButton.setText("Browse");

        browseDirectoryButton.setText("Browse");

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addGroup(layout.createSequentialGroup()
                        .addGap(0, 0, Short.MAX_VALUE)
                        .addComponent(validButton))
                    .addGroup(javax.swing.GroupLayout.Alignment.LEADING, layout.createSequentialGroup()
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(labelXml)
                            .addComponent(labelDirectory))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(inputXml, javax.swing.GroupLayout.DEFAULT_SIZE, 227, Short.MAX_VALUE)
                            .addComponent(inputDirectory))))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                        .addComponent(closeButton)
                        .addComponent(browseXmlButton))
                    .addComponent(browseDirectoryButton))
                .addContainerGap())
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(inputXml, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(browseXmlButton))
                        .addGap(0, 0, Short.MAX_VALUE))
                    .addGroup(layout.createSequentialGroup()
                        .addComponent(labelXml)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(labelDirectory)
                            .addComponent(inputDirectory, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(browseDirectoryButton))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 207, Short.MAX_VALUE)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(closeButton)
                            .addComponent(validButton))))
                .addContainerGap())
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton closeButton;
    private javax.swing.JButton validButton;
    private javax.swing.JButton browseXmlButton;
    private javax.swing.JButton browseDirectoryButton;
    private javax.swing.JLabel labelXml;
    private javax.swing.JLabel labelDirectory;
    private javax.swing.JTextField inputXml;
    private javax.swing.JTextField inputDirectory;
    // End of variables declaration//GEN-END:variables
}
