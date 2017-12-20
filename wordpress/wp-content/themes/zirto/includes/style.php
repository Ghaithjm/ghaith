<?php 
/*************************************************
## Daisy Typography
*************************************************/

function zirto_custom_styling() { ?>

<style type="text/css">

<?php $tipigrof = ot_get_option( 'tipigrof', array() ); ?> 
<?php if($tipigrof) { ?>
body{ 
<?php if($tipigrof['font-color'])     { echo 'color:          '.esc_attr($tipigrof['font-color']).'';      }else{ echo '';} ?>;
<?php if($tipigrof['font-family'])    { echo 'font-family:    '.esc_attr($tipigrof['font-family']).'';     }else{ echo '';} ?>;
<?php if($tipigrof['font-size'])      { echo 'font-size:      '.esc_attr($tipigrof['font-size']).'';       }else{ echo '';} ?>;
<?php if($tipigrof['font-style'])     { echo 'font-style:     '.esc_attr($tipigrof['font-style']).'';      }else{ echo '';} ?>;
<?php if($tipigrof['font-variant'])   { echo 'font-variant:   '.esc_attr($tipigrof['font-variant']).'';    }else{ echo '';} ?> ;
<?php if($tipigrof['font-weight'])    { echo 'font-weight:    '.esc_attr($tipigrof['font-weight']).'';     }else{ echo '';} ?> ;
<?php if($tipigrof['letter-spacing']) { echo 'letter-spacing: '.esc_attr($tipigrof['letter-spacing']).'';  }else{ echo '';} ?> ;
<?php if($tipigrof['line-height'])    { echo 'line-height:    '.esc_attr($tipigrof['line-height']).'' ;    }else{ echo '';} ?> ;
<?php if($tipigrof['text-decoration']){ echo 'text-decoration:'.esc_attr($tipigrof['text-decoration']).''; }else{ echo '';} ?> ;
<?php if($tipigrof['text-transform']) { echo 'text-transform: '.esc_attr($tipigrof['text-transform']).'' ; }else{ echo '';} ?> ;
}
<?php } ?>


<?php $h1tipigrof = ot_get_option( 'h1_tipigrof', array() ); ?> 
<?php if($h1tipigrof) { ?>
h1{ 
<?php if($h1tipigrof['font-color'])     { echo 'color:          '.esc_attr($h1tipigrof['font-color']).' !important';      }else{ echo '';} ?>;
<?php if($h1tipigrof['font-family'])    { echo 'font-family:    '.esc_attr($h1tipigrof['font-family']).' !important';     }else{ echo '';} ?>;
<?php if($h1tipigrof['font-size'])      { echo 'font-size:      '.esc_attr($h1tipigrof['font-size']).' !important';       }else{ echo '';} ?>;
<?php if($h1tipigrof['font-style'])     { echo 'font-style:     '.esc_attr($h1tipigrof['font-style']).' !important';      }else{ echo '';} ?>;
<?php if($h1tipigrof['font-variant'])   { echo 'font-variant:   '.esc_attr($h1tipigrof['font-variant']).' !important';    }else{ echo '';} ?> ;
<?php if($h1tipigrof['font-weight'])    { echo 'font-weight:    '.esc_attr($h1tipigrof['font-weight']).' !important';     }else{ echo '';} ?> ;
<?php if($h1tipigrof['letter-spacing']) { echo 'letter-spacing: '.esc_attr($h1tipigrof['letter-spacing']).' !important';  }else{ echo '';} ?> ;
<?php if($h1tipigrof['line-height'])    { echo 'line-height:    '.esc_attr($h1tipigrof['line-height']).' !important' ;    }else{ echo '';} ?> ;
<?php if($h1tipigrof['text-decoration']){ echo 'text-decoration:'.esc_attr($h1tipigrof['text-decoration']).' !important'; }else{ echo '';} ?> ;
<?php if($h1tipigrof['text-transform']) { echo 'text-transform: '.esc_attr($h1tipigrof['text-transform']).' !important' ; }else{ echo '';} ?> ;
}
<?php } ?>



<?php $h2tipigrof = ot_get_option( 'h2_tipigrof', array() ); ?> 
<?php if($h2tipigrof) { ?>
h2{ 
<?php if($h2tipigrof['font-color'])     { echo 'color:          '.esc_attr($h2tipigrof['font-color']).' !important';      }else{ echo '';} ?>;
<?php if($h2tipigrof['font-family'])    { echo 'font-family:    '.esc_attr($h2tipigrof['font-family']).' !important';     }else{ echo '';} ?>;
<?php if($h2tipigrof['font-size'])      { echo 'font-size:      '.esc_attr($h2tipigrof['font-size']).' !important';       }else{ echo '';} ?>;
<?php if($h2tipigrof['font-style'])     { echo 'font-style:     '.esc_attr($h2tipigrof['font-style']).' !important';      }else{ echo '';} ?>;
<?php if($h2tipigrof['font-variant'])   { echo 'font-variant:   '.esc_attr($h2tipigrof['font-variant']).' !important';    }else{ echo '';} ?> ;
<?php if($h2tipigrof['font-weight'])    { echo 'font-weight:    '.esc_attr($h2tipigrof['font-weight']).' !important';     }else{ echo '';} ?> ;
<?php if($h2tipigrof['letter-spacing']) { echo 'letter-spacing: '.esc_attr($h2tipigrof['letter-spacing']).' !important';  }else{ echo '';} ?> ;
<?php if($h2tipigrof['line-height'])    { echo 'line-height:    '.esc_attr($h2tipigrof['line-height']).' !important' ;    }else{ echo '';} ?> ;
<?php if($h2tipigrof['text-decoration']){ echo 'text-decoration:'.esc_attr($h2tipigrof['text-decoration']).' !important'; }else{ echo '';} ?> ;
<?php if($h2tipigrof['text-transform']) { echo 'text-transform: '.esc_attr($h2tipigrof['text-transform']).' !important' ; }else{ echo '';} ?> ;
}
<?php } ?>


<?php $h3tipigrof = ot_get_option( 'h3_tipigrof', array() ); ?> 
<?php if($h3tipigrof) { ?>
h3{ 
<?php if($h3tipigrof['font-color'])     { echo 'color:          '.esc_attr($h3tipigrof['font-color']).' !important';      }else{ echo '';} ?>;
<?php if($h3tipigrof['font-family'])    { echo 'font-family:    '.esc_attr($h3tipigrof['font-family']).' !important';     }else{ echo '';} ?>;
<?php if($h3tipigrof['font-size'])      { echo 'font-size:      '.esc_attr($h3tipigrof['font-size']).' !important';       }else{ echo '';} ?>;
<?php if($h3tipigrof['font-style'])     { echo 'font-style:     '.esc_attr($h3tipigrof['font-style']).' !important';      }else{ echo '';} ?>;
<?php if($h3tipigrof['font-variant'])   { echo 'font-variant:   '.esc_attr($h3tipigrof['font-variant']).' !important';    }else{ echo '';} ?> ;
<?php if($h3tipigrof['font-weight'])    { echo 'font-weight:    '.esc_attr($h3tipigrof['font-weight']).' !important';     }else{ echo '';} ?> ;
<?php if($h3tipigrof['letter-spacing']) { echo 'letter-spacing: '.esc_attr($h3tipigrof['letter-spacing']).' !important';  }else{ echo '';} ?> ;
<?php if($h3tipigrof['line-height'])    { echo 'line-height:    '.esc_attr($h3tipigrof['line-height']).' !important' ;    }else{ echo '';} ?> ;
<?php if($h3tipigrof['text-decoration']){ echo 'text-decoration:'.esc_attr($h3tipigrof['text-decoration']).' !important'; }else{ echo '';} ?> ;
<?php if($h3tipigrof['text-transform']) { echo 'text-transform: '.esc_attr($h3tipigrof['text-transform']).' !important' ; }else{ echo '';} ?> ;
}
<?php } ?>


<?php $h4tipigrof = ot_get_option( 'h4_tipigrof', array() ); ?> 
<?php if($h4tipigrof) { ?>
h4{ 
<?php if($h4tipigrof['font-color'])     { echo 'color:          '.esc_attr($h4tipigrof['font-color']).' !important';      }else{ echo '';} ?>;
<?php if($h4tipigrof['font-family'])    { echo 'font-family:    '.esc_attr($h4tipigrof['font-family']).' !important';     }else{ echo '';} ?>;
<?php if($h4tipigrof['font-size'])      { echo 'font-size:      '.esc_attr($h4tipigrof['font-size']).' !important';       }else{ echo '';} ?>;
<?php if($h4tipigrof['font-style'])     { echo 'font-style:     '.esc_attr($h4tipigrof['font-style']).' !important';      }else{ echo '';} ?>;
<?php if($h4tipigrof['font-variant'])   { echo 'font-variant:   '.esc_attr($h4tipigrof['font-variant']).' !important';    }else{ echo '';} ?> ;
<?php if($h4tipigrof['font-weight'])    { echo 'font-weight:    '.esc_attr($h4tipigrof['font-weight']).' !important';     }else{ echo '';} ?> ;
<?php if($h4tipigrof['letter-spacing']) { echo 'letter-spacing: '.esc_attr($h4tipigrof['letter-spacing']).' !important';  }else{ echo '';} ?> ;
<?php if($h4tipigrof['line-height'])    { echo 'line-height:    '.esc_attr($h4tipigrof['line-height']).' !important' ;    }else{ echo '';} ?> ;
<?php if($h4tipigrof['text-decoration']){ echo 'text-decoration:'.esc_attr($h4tipigrof['text-decoration']).' !important'; }else{ echo '';} ?> ;
<?php if($h4tipigrof['text-transform']) { echo 'text-transform: '.esc_attr($h4tipigrof['text-transform']).' !important' ; }else{ echo '';} ?> ;
}
<?php } ?>


<?php $h5tipigrof = ot_get_option( 'h5_tipigrof', array() ); ?> 
<?php if($h5tipigrof) { ?>
h5{ 
<?php if($h5tipigrof['font-color'])     { echo 'color:          '.esc_attr($h5tipigrof['font-color']).' !important';      }else{ echo '';} ?>;
<?php if($h5tipigrof['font-family'])    { echo 'font-family:    '.esc_attr($h5tipigrof['font-family']).' !important';     }else{ echo '';} ?>;
<?php if($h5tipigrof['font-size'])      { echo 'font-size:      '.esc_attr($h5tipigrof['font-size']).' !important';       }else{ echo '';} ?>;
<?php if($h5tipigrof['font-style'])     { echo 'font-style:     '.esc_attr($h5tipigrof['font-style']).' !important';      }else{ echo '';} ?>;
<?php if($h5tipigrof['font-variant'])   { echo 'font-variant:   '.esc_attr($h5tipigrof['font-variant']).' !important';    }else{ echo '';} ?> ;
<?php if($h5tipigrof['font-weight'])    { echo 'font-weight:    '.esc_attr($h5tipigrof['font-weight']).' !important';     }else{ echo '';} ?> ;
<?php if($h5tipigrof['letter-spacing']) { echo 'letter-spacing: '.esc_attr($h5tipigrof['letter-spacing']).' !important';  }else{ echo '';} ?> ;
<?php if($h5tipigrof['line-height'])    { echo 'line-height:    '.esc_attr($h5tipigrof['line-height']).' !important' ;    }else{ echo '';} ?> ;
<?php if($h5tipigrof['text-decoration']){ echo 'text-decoration:'.esc_attr($h5tipigrof['text-decoration']).' !important'; }else{ echo '';} ?> ;
<?php if($h5tipigrof['text-transform']) { echo 'text-transform: '.esc_attr($h5tipigrof['text-transform']).' !important' ; }else{ echo '';} ?> ;
}
<?php } ?>


<?php $h6tipigrof = ot_get_option( 'h6_tipigrof', array() ); ?> 
<?php if($h6tipigrof) { ?>
h6{ 
<?php if($h6tipigrof['font-color'])     { echo 'color:          '.esc_attr($h6tipigrof['font-color']).'!important';      }else{ echo '';} ?>;
<?php if($h6tipigrof['font-family'])    { echo 'font-family:    '.esc_attr($h6tipigrof['font-family']).'!important';     }else{ echo '';} ?>;
<?php if($h6tipigrof['font-size'])      { echo 'font-size:      '.esc_attr($h6tipigrof['font-size']).'!important';       }else{ echo '';} ?>;
<?php if($h6tipigrof['font-style'])     { echo 'font-style:     '.esc_attr($h6tipigrof['font-style']).'!important';      }else{ echo '';} ?>;
<?php if($h6tipigrof['font-variant'])   { echo 'font-variant:   '.esc_attr($h6tipigrof['font-variant']).'!important';    }else{ echo '';} ?> ;
<?php if($h6tipigrof['font-weight'])    { echo 'font-weight:    '.esc_attr($h6tipigrof['font-weight']).'!important';     }else{ echo '';} ?> ;
<?php if($h6tipigrof['letter-spacing']) { echo 'letter-spacing: '.esc_attr($h6tipigrof['letter-spacing']).'!important';  }else{ echo '';} ?> ;
<?php if($h6tipigrof['line-height'])    { echo 'line-height:    '.esc_attr($h6tipigrof['line-height']).'!important' ;    }else{ echo '';} ?> ;
<?php if($h6tipigrof['text-decoration']){ echo 'text-decoration:'.esc_attr($h6tipigrof['text-decoration']).'!important'; }else{ echo '';} ?> ;
<?php if($h6tipigrof['text-transform']) { echo 'text-transform: '.esc_attr($h6tipigrof['text-transform']).'!important' ; }else{ echo '';} ?> ;
}
<?php } ?>


<?php $ptipigrof = ot_get_option( 'p_tipigrof', array() ); ?> 
<?php if($ptipigrof) { ?>
p{ 
<?php if($ptipigrof['font-color'])     { echo 'color:          '.esc_attr($ptipigrof['font-color']).'!important';      }else{ echo '';} ?>;
<?php if($ptipigrof['font-family'])    { echo 'font-family:    '.esc_attr($ptipigrof['font-family']).'!important';     }else{ echo '';} ?>;
<?php if($ptipigrof['font-size'])      { echo 'font-size:      '.esc_attr($ptipigrof['font-size']).'!important';       }else{ echo '';} ?>;
<?php if($ptipigrof['font-style'])     { echo 'font-style:     '.esc_attr($ptipigrof['font-style']).'!important';      }else{ echo '';} ?>;
<?php if($ptipigrof['font-variant'])   { echo 'font-variant:   '.esc_attr($ptipigrof['font-variant']).'!important';    }else{ echo '';} ?> ;
<?php if($ptipigrof['font-weight'])    { echo 'font-weight:    '.esc_attr($ptipigrof['font-weight']).'!important';     }else{ echo '';} ?> ;
<?php if($ptipigrof['letter-spacing']) { echo 'letter-spacing: '.esc_attr($ptipigrof['letter-spacing']).'!important';  }else{ echo '';} ?> ;
<?php if($ptipigrof['line-height'])    { echo 'line-height:    '.esc_attr($ptipigrof['line-height']).'!important' ;    }else{ echo '';} ?> ;
<?php if($ptipigrof['text-decoration']){ echo 'text-decoration:'.esc_attr($ptipigrof['text-decoration']).'!important'; }else{ echo '';} ?> ;
<?php if($ptipigrof['text-transform']) { echo 'text-transform: '.esc_attr($ptipigrof['text-transform']).'!important' ; }else{ echo '';} ?> ;
}
<?php } ?>

<?php if(!is_front_page() || is_home() ) { ?>
.navbar-fixed-top{
    background: rgba(0,0,0,0.7);
}
<?php } ?>

</style>
<?php }
add_action('wp_head','zirto_custom_styling');

?>