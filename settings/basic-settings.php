<?php

class HomeSection extends WPSettingsThemeSectionBase
{
    public $title = "Home";
}


class NombreSettings extends WPSettingsThemeTextField
{
    public $section = 'HomeSection';
    public $title   = "nombre";
    public $type    = "text";
    public $id      = "nombre";
}

class ApellidoSettings extends WPSettingsThemeTextField
{
    public $section = 'HomeSection';
    public $title   = "Apellido";
    public $type    = "text";
    public $id      = "apellido";
}

class OtroSettings extends WPSettingsThemeTextField
{
    public $title   = "Otra";
    public $type    = "date";
    public $id      = "otro";
    public $desc    = "Texto de ayuda";
    public $defaultValue = 'probando...';
    public $args    = array(
        "with" => 350
    );
}

/*    $label;
    $type;
    $id;
    $name;
    $desc;
    $class*/
/*register_setting( $option_group, $option_name, $sanitize_callback );
add_settings_section( $id, $title, $callback, $page );
add_settings_field( $id, $title, $callback, $page, $section, $args );*/

/*
    register_setting( 'pu_theme_options', 'pu_theme_options', 'pu_validate_settings' );
    register_setting( $option_group, $option_name, $sanitize_callback );

    // Add settings section
    add_settings_section( 'pu_text_section', 'Text box Title', 'pu_display_section', 'pu_theme_options.php' );
    add_settings_section( $id, $title, $callback, $page );
    // Create textbox field
    $field_args = array(
      'type'      => 'text',
      'id'        => 'pu_textbox',
      'name'      => 'pu_textbox',
      'desc'      => 'Example of textbox description',
      'std'       => '',
      'label_for' => 'pu_textbox',
      'class'     => 'css_class'
    );

    add_settings_field( 'example_textbox', 'Example Textbox', 'pu_display_setting', 'pu_theme_options.php', 'pu_text_section', $field_args );
    add_settings_field( $id, $title, $callback, $page, $section, $args );
*/