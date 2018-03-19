<?php if ( ! defined('ABSPATH')) exit('No direct script access allowed');

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://philsbury.uk
 * @since      2.0.0
 *
 * @package    Age_Gate
 * @subpackage Age_Gate/admin
 */

/**
 * Adds the restriction options to taxonomies
 *
 * @package    Age_Gate
 * @subpackage Age_Gate/admin
 * @author     Phil Baker
 */
class Age_Gate_Update {

  /**
   * Detacte the type of update
   * @param  [type] $current_version [description]
   * @param  [type] $new_version     [description]
   * @return [type]                  [description]
   */
  public function get_upgrade_magnitude( $current_version, $new_version ) {
		$current_version_array = explode('.', (string)$current_version);
		$new_version_array = explode('.', (string)$new_version);
		if ( $new_version_array[0] > $current_version_array[0]) {
			return 'milestone';
		} elseif ( $new_version_array[1] > $current_version_array[1] ) {
			return 'major';
		} elseif ( isset($new_version_array[2]) && isset($current_version_array[2]) && $new_version_array[2] > $current_version_array[2] ) {
			return 'minor';
		}
		return 'unknown';
	}


  public function in_plugin_update_message($plugin_data, $r)
  {

    $current_version = $plugin_data['Version'];
		$new_version = $plugin_data['new_version'];

    $upgrade_magnitude = $this->get_upgrade_magnitude($current_version, $new_version);

    switch ($upgrade_magnitude) {
      case 'milestone':
        echo '<br />' . $this->update_message_milestone();
      break;
      case 'major':
        echo '<br />' . $this->update_message_major();
      break;
      default:
        echo '<br />' . $this->update_message_minor();
        return;
      break;
    }

  }

  protected function disable_update()
  {
    $m = '<style>#age-gate-update .update-link {pointer-events: none;cursor: default; opacity:0.3;}</style>';
    return $m;
  }

  public function update_message_minor()
  {
    $message = '<br>' . __('This is a minor release of Age Gate, updating directly should not cause any issues, however do ensure you have backed up any previous version settings..', 'age-gate') . ' ';
    return $message;
  }

  public function update_message_major()
  {
    $message = '<br><b>' . __('WARNING', 'age-gate') . ':</b> ' . __('This is a major release of Age Gate that could have unexpected results on your site.', 'age-gate') . ' ';
    $message .=  __('While it should be safe to update, it is advised that test locally or on a staging site first.', 'age-gate');
    return $message;
  }

  public function update_message_milestone()
  {
    $message = '<br><b>' . __('WARNING', 'age-gate') . ':</b> ' . __('This is a milestone release of Age Gate that could have unexpected results on your site.', 'age-gate') . ' ';
    $message .=  __('It is advised that you do not update on a live website and test locally or on a staging site first.', 'age-gate') . '<br><br>';
    $message .=  __('The update link has been disabled just to be safe, but if you are sure you want to update you can enable the update link here: ', 'age-gate') . '<button class="button enable-update" type="button">' . __('Enable update') . '</button>';
    $message .= $this->disable_update();
    return $message;
  }

  // Things to prompt testers!
  public function upcoming_release_notice()
  {
    if(isset($_GET['wp_age_gate_silence']) && $_GET['wp_age_gate_silence'] == 1){
      update_option('wp_age_gate_stop_message', 1);
    }

    if(!$stop = get_option('wp_age_gate_stop_message')){

      $link = add_query_arg(
        ['wp_age_gate_silence' => 1 ]
      );

      echo '<div class="notice-info settings-error notice is-dismissible"><p><strong>Age Gate v2.0.0:</strong> Thank you for using Age Gate. Version 2 of the plugin is currently being tested. If you would like to try it, please see <a href="https://wordpress.org/support/topic/age-gate-v2/" target="_blank">this thread</a>.<br /><br />
        <a href="' . $link . '" class="button dismiss-alpha">Don&rsquo;t show again</a></p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button></div>';


    }
  }

}