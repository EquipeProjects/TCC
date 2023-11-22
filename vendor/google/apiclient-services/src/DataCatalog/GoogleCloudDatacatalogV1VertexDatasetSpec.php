<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\DataCatalog;

class GoogleCloudDatacatalogV1VertexDatasetSpec extends \Google\Model
{
  /**
   * @var string
   */
  public $dataItemCount;
  /**
   * @var string
   */
  public $dataType;

  /**
   * @param string
   */
  public function setDataItemCount($dataItemCount)
  {
    $this->dataItemCount = $dataItemCount;
  }
  /**
   * @return string
   */
  public function getDataItemCount()
  {
    return $this->dataItemCount;
  }
  /**
   * @param string
   */
  public function setDataType($dataType)
  {
    $this->dataType = $dataType;
  }
  /**
   * @return string
   */
  public function getDataType()
  {
    return $this->dataType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatacatalogV1VertexDatasetSpec::class, 'Google_Service_DataCatalog_GoogleCloudDatacatalogV1VertexDatasetSpec');
