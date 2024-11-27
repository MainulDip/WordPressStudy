import React from 'react'
import {useBlockProps} from '@wordpress/block-editor';

function Save() {
  return (
    <p { ...useBlockProps.save() }>
      { 'Copyright Date Block – hello from the saved content! ' }
    </p>
  )
}

export default Save