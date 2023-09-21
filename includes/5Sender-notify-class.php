<?php
/**
 * Integration Demo.
 *
 * @package   WC_5Sender_notify_Integration
 * @category Integration
 * @author   Addweb Solution Pvt. Ltd.
 *
 */
if (!class_exists('WC_5Sender_Integration')):
    class WC_5Sender_Integration extends WC_Integration
{
        /**
         * Init and hook in the integration.
         */
        public function __construct()
    {
            global $woocommerce;
            $this->id = 'my-plugin-notify-message-sms';
            $this->method_title = __('5Sender Notification Sms');
            $this->method_description = __('Plugin d\'intégration woocommerce pour les notifications message sms');
            // Load the settings.
            $this->init_form_fields();
            $this->init_settings();
            // Define user set variables.
            // Actions.
            add_action('woocommerce_update_options_integration_' . $this->id, array(&$this, 'process_admin_options'));

// Define user set variables
            $this->api_token = $this->settings['api_token'];
            $this->cle_marchand = $this->settings['cle_marchand'];
            $this->status = $this->settings['status'];
            $this->entete_message = $this->settings['entete_message'];
            $this->customer_message = $this->settings['customer_message'];
            $this->seller_number_notify = $this->settings['seller_number_notify'];
            $this->commerciale_sms_notify = $this->settings['admin_notify'];
        }
        /**
         * Initialize integration settings form fields.
         */
        public function init_form_fields()
    {
            $this->form_fields = array(

                'status' => array(
                    'title' => __('Production', '5Sender sms message notification'),
                    'type' => 'checkbox',
                    'label' => __('Mode production', '5Sender sms message notification'),
                    'default' => 'no',
                    'description' => __('Status', '5Sender sms message notification'),
                ),
                'api_token' => array(
                    'title' => __('Api_Token'),
                    'type' => 'text',
                    'description' => __('api_token'),
                    'desc_tip' => true,
                    'default' => 'euui23rfdkjf8hfkfofnhjdhfjd9',
                    'css' => 'width:2O0px;',
                ),
                'cle_marchand' => array(
                    'title' => __('Clé_marchand'),
                    'type' => 'text',
                    'description' => __('clé_marchand'),
                    'desc_tip' => true,
                    'default' => 'GDHHD-HEIRF-IRJRN-JDJFJ7',
                    'css' => 'width:2O0px;',
                ),
                'entete_message' => array(
                    'title' => __('Entête_message', 'Texte de 11 caractères maximum'),
                    'type' => 'text',
                    'description' => __('Texte de 11 caractères maximum'),
                    'desc_tip' => true,
                    'default' => 'MimiShop',
                    'css' => 'width:2O0px;',
                    'maxlength' => '11',

                ),
                'customer_message' => array(
                    'title' => __('Message_client', 'Votre message à envoyer au client après l\'achat sur votre site'),
                    'type' => 'textarea',
                    'description' => __('Votre message à envoyer au client (150 caractères maximum)', 'customer_message'),
                    'default' => __("Nous avons bien reçu votre commande ", 'customer_message'),
                    'css' => 'width:400px; height: 100px;',
                    'maxlength' => 150,
                ),
                'admin_notify' => array(
                    'title' => __('Ma_boutique_notification', 'Recevoir une notification sms d\'une nouvelle commande'),
                    'type' => 'checkbox',
                    'label' => __('Recevoir une notification sms d\'une nouvelle commande', 'Recevoir une notification sms d\'une nouvelle commande'),
                    'default' => 'no',
                    'description' => __('Status', 'Recevoir une notification sms d\'une nouvelle commande'),
                ),
                'seller_number_notify' => array(
                    'title' => __('Votre numéro pour recevoir un sms de vente sur votre site'),
                    'type' => 'number',
                    'description' => __('Votre numéro pour recevoir un sms de vente sur votre site'),
                    'desc_tip' => true,
                    'default' => '+22901020304',
                    'css' => 'width:2O0px;',
                ),
            );
            if (strlen($this->get_option('entete_message')) > 11) {

                // echo($this->get_option('entete_message'));

                ?>
				<div class="error">
					<p><?php _e('Erreur de paramètre ' . ' Nom de boutique ne doit pas dépasser 11 caractères ', '5sender sms intégration');?></p>
				</div>
				<?php
    }
            if (strlen($this->get_option('customer_message')) > 150) {

                // echo ($this->get_option('customer_message'));

                ?>
				<div class="error">
					<p><?php _e('Erreur de paramètre ' . ' le Message ne doit pas dépasser 150 caractères ', '5sender sms intégration');?></p>
				</div>
				<?php
    }

        }

    }
endif;
