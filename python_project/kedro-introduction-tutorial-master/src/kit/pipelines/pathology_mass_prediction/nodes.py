# Copyright 2020 QuantumBlack Visual Analytics Limited
#
# Licensed under the Apache License, Version 2.0 (the "License");
# you may not use this file except in compliance with the License.
# You may obtain a copy of the License at
#
#     http://www.apache.org/licenses/LICENSE-2.0
#
"""
This is a boilerplate pipeline 'unet_mammogram_mask_prediction'
generated using Kedro 0.16.4
"""
import torchvision.transforms.functional as TF
import torch
from PIL import Image
import numpy as np
import cv2

from Tools.cleanMammogram import crop_borders_with_its_masks, remove_artefacts
from keras.models import load_model
import json


def predict_mass_pathology(json_data):
    model = load_model('data/06_models/mass_initial_200_Nadam0.7301587301587301.h5')
    data = []
    # json_data = json.loads(json_data)

    data.append(int(json_data['abnormality_id'])/1.)
    pure_margins = ['SPICULATED', 'ILL_DEFINED', 'CIRCUMSCRIBED', 'OBSCURED', 'MICROLOBULATED']
    pure_shapes = ['ARCHITECTURAL_DISTORTION','OVAL','IRREGULAR','LYMPH_NODE','LOBULATED','FOCAL_ASYMMETRIC_DENSITY','ROUND','ASYMMETRIC_BREAST_TISSUE']
    for x in pure_shapes:
        if x in json_data['shapes']:
            data.append(1)
        else:
            data.append(0)
    for x in pure_margins:
        if x in json_data['margins']:
            data.append(1)
        else:
            data.append(0)
    data.append(int(json_data['breast_density'])/4.)
    data = np.asarray(data)
    data = np.asarray([data])
    data = np.asarray([data])
    pathology = model.predict(data)[0]
    json_data = {
        'MELIGNANT': float(pathology[0]),
        'BENIGN_WITH_CALLBACKS': float(pathology[1]),
        'BENIGN': float(pathology[2])
    }
    json_data = json.dumps(json_data)
    return json_data


def clean_mask_input(img):
    img = np.asarray(img)
    img = crop_borders_with_its_masks(img)
    img = remove_artefacts(img, False)
    img = cv2.resize(img, (256,256))
    img = Image.fromarray(img)
    return img


def predict_breast_density(img):
    model = load_model('data/06_models/Breast_density_initial_0.950.5269886363636364.h5')
    img = np.asarray(img)
    assert img.shape == (256,256)
    breast_density = model.predict(np.asarray([img]))
    breast_density = breast_density.argmax(axis=1)[0]
    json_data = {
        'breast_density': int(breast_density)
    }
    json_content = json.dumps(json_data)
    return json_content
