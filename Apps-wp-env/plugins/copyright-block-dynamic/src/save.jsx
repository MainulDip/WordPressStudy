import React from 'react'
import { useBlockProps } from '@wordpress/block-editor';

function Save({ attributes }) {
  const { fallbackCurrentYear, showStartingYear, startingYear } = attributes;

  if (!fallbackCurrentYear) {
    return null;
  }

  let displayDate;

  if (showStartingYear && startingYear) {
    displayDate = startingYear + '-' + fallbackCurrentYear;
  } else {
    displayDate = fallbackCurrentYear;
  }

  return (
    <p {...useBlockProps.save()}>© {displayDate}</p>
  );
}

export default Save