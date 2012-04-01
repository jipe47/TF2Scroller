/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package display;

import java.io.IOException;

import javax.swing.JFileChooser;

import display.listener.EventContainer;
import display.listener.WizardAction;
import display.listener.WizardEvent;
import display.listener.WizardEventEmitter;
import display.listener.WizardListener;

/**
 *
 * @author SERVER
 */
public class NewImageWindow extends javax.swing.JDialog implements WizardListener {

	private static final long serialVersionUID = 1L;
	private WizardEventEmitter we;
	private String defaultDestination;
	
	private JFileChooser chooser;
	
    public NewImageWindow(java.awt.Frame parent, boolean modal) {
        super(parent, modal);
        chooser = new JFileChooser();
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

        nameLabel = new javax.swing.JLabel();
        inputName = new javax.swing.JTextField();
        fileLabel = new javax.swing.JLabel();
        inputFile = new javax.swing.JTextField();
        fileBrowseButton = new javax.swing.JButton();
        resizeLabel = new javax.swing.JLabel();
        inputResizeW = new javax.swing.JTextField();
        xLabel = new javax.swing.JLabel();
        inputResizeH = new javax.swing.JTextField();
        ratioCheckbox = new javax.swing.JCheckBox();
        destinationLabel = new javax.swing.JLabel();
        inputDestination = new javax.swing.JTextField();
        destinationBrowseButton = new javax.swing.JButton();
        jSeparator1 = new javax.swing.JSeparator();
        deleteSourceCheckbox = new javax.swing.JCheckBox();
        cancelButton = new javax.swing.JButton();
        validButton = new javax.swing.JButton();
        jPanel1 = new javax.swing.JPanel();
        jLabel6 = new javax.swing.JLabel();

        setTitle("New Image");

        nameLabel.setText("Name:");

        fileLabel.setText("File:");

        fileBrowseButton.setText("Browse");
        fileBrowseButton.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                chooseFile();
            }
        });

        resizeLabel.setText("Resize:");

        xLabel.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        xLabel.setText("x");

        ratioCheckbox.setText("Keep ratio");
        ratioCheckbox.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jCheckBox1ActionPerformed(evt);
            }
        });

        destinationLabel.setText("Destination:");

        inputDestination.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jTextField5ActionPerformed(evt);
            }
        });

        destinationBrowseButton.setText("Browse");
        destinationBrowseButton.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                chooseDestination();
            }
        });

        deleteSourceCheckbox.setText("Delete source file");
        deleteSourceCheckbox.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jCheckBox2ActionPerformed(evt);
            }
        });

        cancelButton.setText("Cancel");
        cancelButton.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                cancel();
            }
        });

        validButton.setText("Add");
        validButton.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                valid();
            }
        });

        javax.swing.GroupLayout jPanel1Layout = new javax.swing.GroupLayout(jPanel1);
        jPanel1.setLayout(jPanel1Layout);
        jPanel1Layout.setHorizontalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGap(0, 0, Short.MAX_VALUE)
        );
        jPanel1Layout.setVerticalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGap(0, 220, Short.MAX_VALUE)
        );

        jLabel6.setText("Preview:");

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jPanel1, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                    .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                        .addComponent(jLabel6)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(jSeparator1))
                    .addGroup(layout.createSequentialGroup()
                        .addComponent(destinationLabel)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(inputDestination)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                        .addComponent(destinationBrowseButton))
                    .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                        .addGap(0, 0, Short.MAX_VALUE)
                        .addComponent(validButton)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(cancelButton))
                    .addGroup(layout.createSequentialGroup()
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addGroup(layout.createSequentialGroup()
                                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addComponent(nameLabel)
                                    .addComponent(fileLabel))
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addComponent(inputName, javax.swing.GroupLayout.PREFERRED_SIZE, 332, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addGroup(layout.createSequentialGroup()
                                        .addComponent(inputFile, javax.swing.GroupLayout.PREFERRED_SIZE, 253, javax.swing.GroupLayout.PREFERRED_SIZE)
                                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                                        .addComponent(fileBrowseButton))
                                    .addGroup(layout.createSequentialGroup()
                                        .addComponent(inputResizeW, javax.swing.GroupLayout.PREFERRED_SIZE, 79, javax.swing.GroupLayout.PREFERRED_SIZE)
                                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                                        .addComponent(xLabel, javax.swing.GroupLayout.PREFERRED_SIZE, 19, javax.swing.GroupLayout.PREFERRED_SIZE)
                                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                                        .addComponent(inputResizeH, javax.swing.GroupLayout.PREFERRED_SIZE, 79, javax.swing.GroupLayout.PREFERRED_SIZE)
                                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                                        .addComponent(ratioCheckbox))))
                            .addComponent(resizeLabel)
                            .addComponent(deleteSourceCheckbox))
                        .addGap(0, 7, Short.MAX_VALUE)))
                .addContainerGap())
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(nameLabel)
                    .addComponent(inputName, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(fileLabel)
                    .addComponent(inputFile, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(fileBrowseButton))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(resizeLabel)
                    .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                        .addComponent(xLabel)
                        .addComponent(inputResizeW, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addComponent(inputResizeH, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addComponent(ratioCheckbox)))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(destinationLabel)
                    .addComponent(inputDestination, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(destinationBrowseButton))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(deleteSourceCheckbox)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addComponent(jSeparator1, javax.swing.GroupLayout.PREFERRED_SIZE, 20, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel6))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jPanel1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 7, Short.MAX_VALUE)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(cancelButton)
                    .addComponent(validButton))
                .addContainerGap())
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void jCheckBox1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jCheckBox1ActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_jCheckBox1ActionPerformed

    private void jTextField5ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jTextField5ActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_jTextField5ActionPerformed

    private void jCheckBox2ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jCheckBox2ActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_jCheckBox2ActionPerformed
    
    private void chooseFile()
    {
    	chooser.setDialogTitle("Choose an image");
		chooser.setFileSelectionMode(JFileChooser.FILES_ONLY);
		chooser.setAcceptAllFileFilterUsed(false);

		if (chooser.showOpenDialog(this) == JFileChooser.APPROVE_OPTION) {
			String s = "-1";
			try {
				s = chooser.getSelectedFile().getCanonicalPath();
				this.inputFile.setText(s);
			} catch (IOException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		}
    }
    
    private void chooseDestination()
    {
    	chooser.setDialogTitle("Choose a destination");
		chooser.setFileSelectionMode(JFileChooser.DIRECTORIES_ONLY);
		chooser.setAcceptAllFileFilterUsed(false);

		if (chooser.showOpenDialog(this) == JFileChooser.APPROVE_OPTION) {
			String s = "-1";
			try {
				s = chooser.getSelectedFile().getCanonicalPath();
				this.inputDestination.setText(s);
			} catch (IOException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		}
    }
    private void valid()
    {
    	EventContainer ec = new EventContainer();
    	ec.addArg("name", inputName.getText());
    	ec.addArg("file", inputFile.getText());
    	ec.addArg("resizeW", inputResizeW.getText());
    	ec.addArg("resizeH", inputResizeH.getText());
    	ec.addArg("ratio", ratioCheckbox.isSelected());
    	ec.addArg("deleteSource", deleteSourceCheckbox.isSelected());
    	ec.addArg("destination", inputDestination.getText());
    	
    	we.fireEvent(new WizardEvent(WizardAction.NewImage, ec));
    	
    	cancel();
    }
    
    private void cancel()
    {
    	this.setVisible(false);
    	reset();
    }
    
    private void reset()
    {
    	inputName.setText("");
    	inputFile.setText("");
    	inputResizeW.setText("");
    	inputResizeH.setText("");
    	ratioCheckbox.setSelected(true);
    	deleteSourceCheckbox.setSelected(false);
    	inputDestination.setText(defaultDestination);
    }
    
    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton fileBrowseButton;
    private javax.swing.JButton destinationBrowseButton;
    private javax.swing.JButton cancelButton;
    private javax.swing.JButton validButton;
    private javax.swing.JCheckBox ratioCheckbox;
    private javax.swing.JCheckBox deleteSourceCheckbox;
    private javax.swing.JLabel nameLabel;
    private javax.swing.JLabel fileLabel;
    private javax.swing.JLabel resizeLabel;
    private javax.swing.JLabel xLabel;
    private javax.swing.JLabel destinationLabel;
    private javax.swing.JLabel jLabel6;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JSeparator jSeparator1;
    private javax.swing.JTextField inputName;
    private javax.swing.JTextField inputFile;
    private javax.swing.JTextField inputResizeW;
    private javax.swing.JTextField inputResizeH;
    private javax.swing.JTextField inputDestination;
    // End of variables declaration//GEN-END:variables

	public void actionPerformed(WizardEvent arg0) {
		WizardAction action = arg0.getAction();
		
		if(action == WizardAction.NewProject)
		{
			this.defaultDestination = (String) arg0.getArg("directory");
		}
	}
}
